    <div id="waitOverlay">
        <div class="text">
            <p class="flex flex-col items-center mb-4">
                <svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(255, 255, 255)"
                    class="w-8 h-8 text-theme-10">
                    <g fill="none" fill-rule="evenodd">
                        <g transform="translate(1 1)" stroke-width="4">
                            <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                            <path d="M36 18c0-9.94-8.06-18-18-18">
                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18"
                                    dur="1s" repeatCount="indefinite"></animateTransform>
                            </path>
                        </g>
                    </g>
                </svg>
            </p>
            <p class="text-overlay">Cargando imagenes...</p>
        </div>
    </div>

    <section>
        <div class="container">


           <form class="dropzone border-2 border-dashed border-gray-300 rounded-lg p-6 min-h-[200px] flex flex-col items-center justify-center mb-6" id="file-dropzone">
            <div class="dz-message text-center text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <p class="text-lg font-medium">Arrastra tus imágenes aquí</p>
                <p class="text-sm">o haz clic para seleccionar archivos</p>
                <p class="text-xs mt-2">Formatos aceptados: JPG, JPEG, PNG</p>
            </div>
        </form>



            {{ __(' Cada imágen tiene un orden, el mismo orden que tendrán en tu anuncio, la primera posición corresponde a la imagen de la portada') }}


            <div
                class="grid grid-cols md:grid-cols-2 lg:grid-cols-5 justify-center justify-items-center m-2 sortable files">

                @foreach ($imagenes_drop_zone as $imagen)
                    <div id="{{ $imagen['id'] }}" class=" template  m-2">
                        <div class="dz-preview dz-file-preview w-40 h-40 ">
                            <img data-dz-thumbnail src="{{ $imagen['url'] }}" class="w-full h-full object-cover" />
                        </div>
                        <div class="text-center  ">
                            <p>Portada: @if ($imagen['id'] == $anuncio->portada_id)
                                    Actual
                                @endif
                            </p>
                            <p>Portada Doble: @if ($imagen['id'] == $anuncio->dobleportada_id)
                                    Actual
                                @endif
                            </p>
                            @if ($imagen['id'] != $anuncio->dobleportada_id)
                             <form action="{{ route('admin.anuncio.marcar_portada_doble', $anuncio->id) }}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="anuncio_id" id="anuncio_id" value="{{ $anuncio->id }}" >
                                    <input type="hidden" name="imagen_id" id="imagen_id" value="{{ $imagen['id'] }}" > 
                                    <button type="submit" class="bg-red-700 text-white btn-sm px-2 py-1  rounded-lg hover:bg-black hover:text-black">
                                        PD</button>
                                </form> 
                            @else   
                                <form action="{{ route('admin.anuncio.quitar_portada_doble', $anuncio->id) }}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="anuncio_id" id="anuncio_id" value="{{ $anuncio->id }}" >
                                    <input type="hidden" name="imagen_id" id="imagen_id" value="{{ $imagen['id'] }}" > 
                                    <button type="submit" class="bg-red-700 text-white btn-sm px-2 py-1  rounded-lg hover:bg-black hover:text-black">
                                        Quitar PD</button>
                                </form> 
                                                                 
                            @endif

                            <a class="btn btn-info btn-sm"
                                href="{{ config('app.url') . '/images/anuncio/' . $anuncio->id . '/original/' . $imagen['name'] }}"
                                target="_blank">
                                <ion-icon name="eye-outline"></ion-icon>
                            </a>
                            <button data-dz-remove
                                class="bg-red-700 text-white btn-sm px-2 py-1  rounded-lg hover:bg-black hover:text-black  delete">
                                <span>Quitar</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-left my-2">
                <button id="submit"
                    class=" px-2  py-1 text-lg font-medium text-white bg-red-700 rounded hover:bg-green-500 ">
                    {{ __('Confirmar Imágenes y Orden') }}
                </button>
            </div>


            <div id="previews"
                class="grid grid-cols md:grid-cols-2 lg:grid-cols-5  justify-center justify-items-center m-2  ">
                <div id="template" class="template m-2">
                    <div class="dz-preview dz-file-preview w-40 h-40">
                        <div>
                            <img data-dz-thumbnail class="w-full h-full object-cover" />
                        </div>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    </div>
                    <div class="text-center">
                        <p>Portada: </p>

                        <button data-dz-remove
                            class="bg-red-700 text-white btn-sm px-2 py-1 rounded-lg hover:bg-black hover:text-black  delete">
                            <span>Quitar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
