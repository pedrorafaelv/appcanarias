<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scorts Premium Canarias | Companía de lujo</title>
    <meta name="description" content="Las mejores scorts de lujo en Canarias. Encuentra compañía exclusiva en Tenerife, Gran Canaria, Lanzarote y más islas.">
    
    <!-- Fuentes modernas -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #e63946;
            --secondary-color: #1d3557;
            --accent-color: #f1faee;
            --dark-color: #0a1128;
            --light-color: #f8f9fa;
            --gold-color: #d4af37;
            --text-color: #333;
            --text-light: #777;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-color);
            overflow-x: hidden;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header elegante */
        header {
            background: linear-gradient(135deg, var(--dark-color), var(--secondary-color));
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--accent-color);
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .logo i {
            color: var(--gold-color);
            margin-right: 10px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 1.5rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }
        
        nav ul li a:hover {
            color: var(--gold-color);
        }
        
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--gold-color);
            bottom: -5px;
            left: 0;
            transition: width 0.3s;
        }
        
        nav ul li a:hover::after {
            width: 100%;
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Hero section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1519046904884-53103b34b206?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            margin-top: 0;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn:hover {
            background: #c1121f;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid white;
            margin-left: 1rem;
        }
        
        .btn-outline:hover {
            background: white;
            color: var(--primary-color);
        }
        
        /* Sección de anuncios - Manteniendo estructura original pero con diseño mejorado */
        .anuncios-section {
            padding: 5rem 0;
            background-color: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Estructura de anuncios como viene de BD pero con estilos modernos */
        .anuncios-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .anuncio {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        
        .anuncio:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .anuncio-imagen {
            height: 300px;
            overflow: hidden;
        }
        
        .anuncio-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .anuncio:hover .anuncio-imagen img {
            transform: scale(1.05);
        }
        
        .anuncio-contenido {
            padding: 1.5rem;
        }
        
        .anuncio-titulo {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }
        
        .anuncio-location {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .anuncio-descripcion {
            color: var(--text-light);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .anuncio-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        
        .anuncio-price {
            font-weight: 700;
            color: var(--secondary-color);
            font-size: 1.1rem;
        }
        
        .anuncio-age {
            color: var(--text-light);
        }
        
        .anuncio-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            font-size: 0.8rem;
            color: var(--text-light);
        }
        
        .meta-item i {
            color: var(--gold-color);
            margin-right: 0.3rem;
        }
        
        .anuncio-contacto {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .contacto-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .contacto-btn:hover {
            background: #c1121f;
        }
        
        .favorito-btn {
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .favorito-btn:hover {
            color: var(--primary-color);
        }
        
        /* Filtros */
        .filtros-section {
            background: var(--accent-color);
            padding: 1.5rem 0;
            margin-bottom: 2rem;
        }
        
        .filtros-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .filtro-group {
            flex: 1;
            min-width: 200px;
        }
        
        .filtro-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .filtro-group select, .filtro-group input {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
            
            nav {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 80px);
                background: var(--dark-color);
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                padding: 2rem 0;
                transition: left 0.3s;
                z-index: 999;
            }
            
            nav.active {
                left: 0;
            }
            
            nav ul {
                flex-direction: column;
                width: 100%;
            }
            
            nav ul li {
                margin: 0;
                width: 100%;
                text-align: center;
                padding: 1rem 0;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .btn-container {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn-outline {
                margin-left: 0;
            }
        }
        
        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .anuncio-imagen {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-crown"></i>
                <span>Canarias Elite</span>
            </a>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            
            <nav id="mainNav">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#anuncios">Anuncios</a></li>
                    <li><a href="#islas">Islas</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Compañía de lujo en las Islas Canarias</h1>
            <p>Descubre las scorts más exclusivas y sofisticadas de Tenerife, Gran Canaria, Lanzarote y más islas. Experiencias premium discretas y personalizadas.</p>
            <div class="btn-container">
                <a href="#anuncios" class="btn">Ver anuncios</a>
                <a href="#contacto" class="btn btn-outline">Contactar</a>
            </div>
        </div>
    </section>
    
    <!-- Filtros Section -->
    <section class="filtros-section">
        <div class="container">
            <div class="filtros-container">
                <div class="filtro-group">
                    <label for="isla">Isla</label>
                    <select id="isla">
                        <option value="">Todas las islas</option>
                        <option value="tenerife">Tenerife</option>
                        <option value="gran-canaria">Gran Canaria</option>
                        <option value="lanzarote">Lanzarote</option>
                        <option value="fuerteventura">Fuerteventura</option>
                    </select>
                </div>
                
                <div class="filtro-group">
                    <label for="ciudad">Ciudad</label>
                    <select id="ciudad">
                        <option value="">Todas las ciudades</option>
                        <option value="santa-cruz">Santa Cruz de Tenerife</option>
                        <option value="las-palmas">Las Palmas</option>
                        <option value="puerto-cruz">Puerto de la Cruz</option>
                        <option value="arrecife">Arrecife</option>
                    </select>
                </div>
                
                <div class="filtro-group">
                    <label for="edad">Edad</label>
                    <select id="edad">
                        <option value="">Cualquier edad</option>
                        <option value="18-25">18-25 años</option>
                        <option value="26-30">26-30 años</option>
                        <option value="31-35">31-35 años</option>
                        <option value="36+">36+ años</option>
                    </select>
                </div>
                
                <div class="filtro-group">
                    <label for="precio">Precio/hora</label>
                    <select id="precio">
                        <option value="">Cualquier precio</option>
                        <option value="100-150">100-150€</option>
                        <option value="151-200">151-200€</option>
                        <option value="201-300">201-300€</option>
                        <option value="301+">300€+</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Anuncios Section - Estructura como viene de BD -->
    <section class="anuncios-section" id="anuncios">
        <div class="container">
            <div class="section-title">
                <h2>Anuncios Premium</h2>
                <p>Las mejores scorts profesionales en las Islas Canarias</p>
            </div>
            
            <div class="anuncios-container">
                <!-- Anuncio 1 - Ejemplo de estructura desde BD -->
                <div class="anuncio">
                    <div class="anuncio-imagen">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Scort Sofía - Tenerife">
                    </div>
                    <div class="anuncio-contenido">
                        <h3 class="anuncio-titulo">Sofía</h3>
                        <div class="anuncio-location">Tenerife, Santa Cruz</div>
                        <p class="anuncio-descripcion">Compañera sofisticada y discreta para momentos inolvidables. Experiencia premium garantizada.</p>
                        
                        <div class="anuncio-details">
                            <span class="anuncio-price">200€/hora</span>
                            <span class="anuncio-age">25 años</span>
                        </div>
                        
                        <div class="anuncio-meta">
                            <span class="meta-item"><i class="fas fa-ruler-vertical"></i> 172cm</span>
                            <span class="meta-item"><i class="fas fa-weight"></i> 58kg</span>
                            <span class="meta-item"><i class="fas fa-tshirt"></i> 90-60-90</span>
                            <span class="meta-item"><i class="fas fa-eye"></i> Morena</span>
                        </div>
                        
                        <div class="anuncio-contacto">
                            <button class="contacto-btn">Contactar</button>
                            <button class="favorito-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Anuncio 2 -->
                <div class="anuncio">
                    <div class="anuncio-imagen">
                        <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Scort Valeria - Gran Canaria">
                    </div>
                    <div class="anuncio-contenido">
                        <h3 class="anuncio-titulo">Valeria</h3>
                        <div class="anuncio-location">Gran Canaria, Las Palmas</div>
                        <p class="anuncio-descripcion">Elegancia y sensualidad en una experiencia única. Discreción absoluta garantizada.</p>
                        
                        <div class="anuncio-details">
                            <span class="anuncio-price">180€/hora</span>
                            <span class="anuncio-age">28 años</span>
                        </div>
                        
                        <div class="anuncio-meta">
                            <span class="meta-item"><i class="fas fa-ruler-vertical"></i> 168cm</span>
                            <span class="meta-item"><i class="fas fa-weight"></i> 55kg</span>
                            <span class="meta-item"><i class="fas fa-tshirt"></i> 88-58-88</span>
                            <span class="meta-item"><i class="fas fa-eye"></i> Rubia</span>
                        </div>
                        
                        <div class="anuncio-contacto">
                            <button class="contacto-btn">Contactar</button>
                            <button class="favorito-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Anuncio 3 -->
                <div class="anuncio">
                    <div class="anuncio-imagen">
                        <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Scort Carla - Lanzarote">
                    </div>
                    <div class="anuncio-contenido">
                        <h3 class="anuncio-titulo">Carla</h3>
                        <div class="anuncio-location">Lanzarote, Arrecife</div>
                        <p class="anuncio-descripcion">Compañía de lujo para caballeros exigentes. Momentos inolvidables con la máxima discreción.</p>
                        
                        <div class="anuncio-details">
                            <span class="anuncio-price">220€/hora</span>
                            <span class="anuncio-age">23 años</span>
                        </div>
                        
                        <div class="anuncio-meta">
                            <span class="meta-item"><i class="fas fa-ruler-vertical"></i> 175cm</span>
                            <span class="meta-item"><i class="fas fa-weight"></i> 60kg</span>
                            <span class="meta-item"><i class="fas fa-tshirt"></i> 92-62-92</span>
                            <span class="meta-item"><i class="fas fa-eye"></i> Castaña</span>
                        </div>
                        
                        <div class="anuncio-contacto">
                            <button class="contacto-btn">Contactar</button>
                            <button class="favorito-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Anuncio 4 -->
                <div class="anuncio">
                    <div class="anuncio-imagen">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Scort Daniela - Fuerteventura">
                    </div>
                    <div class="anuncio-contenido">
                        <h3 class="anuncio-titulo">Daniela</h3>
                        <div class="anuncio-location">Fuerteventura, Corralejo</div>
                        <p class="anuncio-descripcion">Experiencia premium con una compañera sofisticada y sensual. Discreción absoluta.</p>
                        
                        <div class="anuncio-details">
                            <span class="anuncio-price">190€/hora</span>
                            <span class="anuncio-age">27 años</span>
                        </div>
                        
                        <div class="anuncio-meta">
                            <span class="meta-item"><i class="fas fa-ruler-vertical"></i> 170cm</span>
                            <span class="meta-item"><i class="fas fa-weight"></i> 56kg</span>
                            <span class="meta-item"><i class="fas fa-tshirt"></i> 89-59-89</span>
                            <span class="meta-item"><i class="fas fa-eye"></i> Morena</span>
                        </div>
                        
                        <div class="anuncio-contacto">
                            <button class="contacto-btn">Contactar</button>
                            <button class="favorito-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Anuncio 5 -->
                <div class="anuncio">
                    <div class="anuncio-imagen">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Scort Elena - Tenerife">
                    </div>
                    <div class="anuncio-contenido">
                        <h3 class="anuncio-titulo">Elena</h3>
                        <div class="anuncio-location">Tenerife, Puerto de la Cruz</div>
                        <p class="anuncio-descripcion">Compañía exclusiva para caballeros que buscan elegancia y sofisticación.</p>
                        
                        <div class="anuncio-details">
                            <span class="anuncio-price">250€/hora</span>
                            <span class="anuncio-age">30 años</span>
                        </div>
                        
                        <div class="anuncio-meta">
                            <span class="meta-item"><i class="fas fa-ruler-vertical"></i> 169cm</span>
                            <span class="meta-item"><i class="fas fa-weight"></i> 57kg</span>
                            <span class="meta-item"><i class="fas fa-tshirt"></i> 91-61-91</span>
                            <span class="meta-item"><i class="fas fa-eye"></i> Rubia</span>
                        </div>
                        
                        <div class="anuncio-contacto">
                            <button class="contacto-btn">Contactar</button>
                            <button class="favorito-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Anuncio 6 -->
                <div class="anuncio">
                    <div class="anuncio-imagen">
                        <img src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Scort Natalia - Gran Canaria">
                    </div>
                    <div class="anuncio-contenido">
                        <h3 class="anuncio-titulo">Natalia</h3>
                        <div class="anuncio-location">Gran Canaria, Maspalomas</div>
                        <p class="anuncio-descripcion">Sensualidad y elegancia en una experiencia premium. Discreción garantizada.</p>
                        
                        <div class="anuncio-details">
                            <span class="anuncio-price">210€/hora</span>
                            <span class="anuncio-age">26 años</span>
                        </div>
                        
                        <div class="anuncio-meta">
                            <span class="meta-item"><i class="fas fa-ruler-vertical"></i> 173cm</span>
                            <span class="meta-item"><i class="fas fa-weight"></i> 59kg</span>
                            <span class="meta-item"><i class="fas fa-tshirt"></i> 93-63-93</span>
                            <span class="meta-item"><i class="fas fa-eye"></i> Castaña</span>
                        </div>
                        
                        <div class="anuncio-contacto">
                            <button class="contacto-btn">Contactar</button>
                            <button class="favorito-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <h4>Canarias Elite</h4>
                    <p>El servicio de scorts premium más exclusivo de las Islas Canarias. Discreción y elegancia garantizadas.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h4>Enlaces rápidos</h4>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#anuncios">Anuncios</a></li>
                        <li><a href="#islas">Islas</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Islas</h4>
                    <ul>
                        <li><a href="#">Tenerife</a></li>
                        <li><a href="#">Gran Canaria</a></li>
                        <li><a href="#">Lanzarote</a></li>
                        <li><a href="#">Fuerteventura</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Aviso legal</a></li>
                        <li><a href="#">Política de privacidad</a></li>
                        <li><a href="#">Cookies</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 Canarias Elite. Todos los derechos reservados. Servicio exclusivo para mayores de 18 años.</p>
            </div>
        </div>
    </footer>
    
    <script>
        // Menú móvil
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        
        mobileMenuBtn.addEventListener('click', () => {
            mainNav.classList.toggle('active');
        });
        
        // Cerrar menú al hacer clic en un enlace
        const navLinks = document.querySelectorAll('nav ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (mainNav.classList.contains('active')) {
                    mainNav.classList.remove('active');
                }
            });
        });
        
        // Smooth scrolling para anclas
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Botones de favorito
        const favoritoBtns = document.querySelectorAll('.favorito-btn');
        favoritoBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.style.color = 'var(--primary-color)';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.style.color = 'var(--text-light)';
                }
            });
        });
        
        // Filtros (simulación)
        const filtroSelects = document.querySelectorAll('.filtro-group select');
        filtroSelects.forEach(select => {
            select.addEventListener('change', function() {
                // Aquí iría la lógica para filtrar los anuncios
                console.log(`Filtrar por ${this.id}: ${this.value}`);
            });
        });
    </script>
</body>
</html>