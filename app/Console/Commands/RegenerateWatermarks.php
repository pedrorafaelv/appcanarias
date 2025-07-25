<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Anuncio;
use App\Models\Imagen;
use Image;

class RegenerateWatermarks extends Command
{
    protected $signature = 'watermarks:regenerate {--backup : Create backup of current watermarked images}';
    protected $description = 'Regenerate watermarked images from originals for active anuncios';

    public function handle()
    {
        if (!$this->confirm('This will regenerate watermarks for all ACTIVE anuncios. Continue?', true)) {
            $this->info('Operation cancelled.');
            return;
        }

        $this->info('Starting watermark regeneration for active anuncios...');
        
        if ($this->option('backup')) {
            $this->createBackup();
        }
        
        // Only get active anuncios
        $anuncios = Anuncio::where('estado', 'Publicado')->with('imagens')->get();
// Add after line 29:
$this->info("Total anuncios found: " . $anuncios->count());
$this->info("Checking anuncio estados: ");
foreach ($anuncios as $anuncio) {
    $this->info("Anuncio ID: {$anuncio->id}, Estado: {$anuncio->estado}, Images: {$anuncio->imagens->count()}");
}
        $totalImages = Imagen::whereIn('anuncio_id', $anuncios->pluck('id'))->count();
        
        if ($totalImages === 0) {
            $this->warn('No images found to process in active anuncios.');
            return;
        }

        $this->info("Found {$anuncios->count()} active anuncios with {$totalImages} images to process.");
        
        $bar = $this->output->createProgressBar($totalImages);
        $errors = [];
        $processed = 0;
        $skipped = 0;

        foreach ($anuncios as $anuncio) {
            $path = public_path() . '/images/anuncio/' . $anuncio->id . '/';
            $pathoriginal = public_path() . '/images/anuncio/' . $anuncio->id . '/original/';

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            foreach ($anuncio->imagens as $imagen) {
                $originalPath = $pathoriginal . $imagen->nombre;
                
                if (!file_exists($originalPath)) {
                    $this->warn("\nOriginal not found: {$originalPath}");
                    $skipped++;
                    $bar->advance();
                    continue;
                }

                try {
                    $this->info("\nProcessing image: " . $imagen->nombre);
                    $this->info("Original path: " . $originalPath);
                    $this->info("Target path: " . $path . $imagen->nombre);

                    // Check if original exists
                    if (!file_exists($originalPath)) {
                        throw new \Exception("Original image not found: {$originalPath}");
                    }

                    // Load original image
                    $img = Image::make($originalPath);
                    
                    // Load watermark
                    $watermarkPath = public_path() . '/images/logo300.png';
                    if (!file_exists($watermarkPath)) {
                        throw new \Exception("Watermark file not found at: {$watermarkPath}");
                    }
                    
                    $watermark = Image::make($watermarkPath);
                    
                    // Calculate dimensions - using 260px width
                    $maxWidth = 260;
                    $maxHeight = $img->height() * 0.25;
                    
                    // Resize watermark
                    $watermark->resize($maxWidth, $maxHeight, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    
                    // Set opacity to 50%
                    $watermark->opacity(50);
                    
                    // Insert watermark in center position
                    $img->insert($watermark, 'center');
                    
                    // Force save with overwrite
                    $img->save($path . $imagen->nombre, 100, 'jpg', true);
                    
                    $this->info("Successfully processed: " . $imagen->nombre);
                    
                    $processed++;
                    $bar->advance();
                } catch (\Exception $e) {
                    $errors[] = "Error processing {$imagen->nombre}: " . $e->getMessage();
                    $this->error("Error: " . $e->getMessage());
                    $bar->advance();
                }
            }
        }

        $bar->finish();
        
        $this->info("\n\nWatermark regeneration completed!");
        $this->info("Processed: {$processed}");
        $this->info("Skipped: {$skipped}");
        
        if (count($errors) > 0) {
            $this->error("\nErrors encountered:");
            foreach ($errors as $error) {
                $this->error($error);
            }
        }
    }

    protected function createBackup()
    {
        $this->info('Creating backup...');
        $timestamp = date('Y-m-d_His');
        $backupDir = storage_path("watermarks_backup_{$timestamp}");
        
        // Only backup active anuncios
        foreach (Anuncio::where('estado', 'Activo')->get() as $anuncio) {
            $sourcePath = public_path() . '/images/anuncio/' . $anuncio->id;
            $destPath = $backupDir . '/images/anuncio/' . $anuncio->id;
            
            if (file_exists($sourcePath)) {
                if (!file_exists($destPath)) {
                    mkdir($destPath, 0777, true);
                }
                
                // Only backup watermarked images (not originals)
                foreach (glob($sourcePath . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE) as $file) {
                    if (!str_contains($file, '/original/')) {
                        copy($file, $destPath . '/' . basename($file));
                    }
                }
            }
        }
        
        $this->info("Backup created at: {$backupDir}");
    }
}
