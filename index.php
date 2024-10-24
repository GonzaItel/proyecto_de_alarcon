<?php
$uid = ''; // Inicializa la variable
$server = ''; // Inicializa el servidor
$email = ''; // Inicializa el correo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar datos del formulario
    $uid = isset($_POST['uid']) ? htmlspecialchars($_POST['uid']) : ''; 
    $server = isset($_POST['server']) ? htmlspecialchars($_POST['server']) : ''; 
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mejor Composición de Genshin</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #001c3d;
        }
        header {
            background: #003366;
            color: white;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        .header-container {
            display: flex;
            align-items: center;
            justify-content: center; 
            margin-top: 10px;
            margin-bottom: 10px;
        }
        nav {
            margin-top: 10px;
        }
        nav ul {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            position: relative;
            margin: 0 15px;
        }

        nav ul ul {
            display: none;
            position: absolute;
            left: 0;
            top: 100%;
            background: #003366;
            padding: 10px 0;
            z-index: 1000;
        }

        nav li:hover > ul {
            display: block;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        nav a:hover {
            text-decoration: none;
            background: rgba(255, 255, 255, 0.1);
        }
        .search-container {
            margin-left: 20px;
            display: flex;
            align-items: center;
        }
        .search-container input[type="text"] {
            padding: 10px;
            width: 200px;
            border: none;
            border-radius: 5px;
        }
        .search-container button {
            padding: 10px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #004494;
        }
        .blur-background {
            min-height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: -1;
        }
        .content {
            position: relative;
            z-index: 1;
            padding: 20px;
            color: white;
            margin-top: 100px;
        }
        #login-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4557de;
            border: 2px solid black;
            padding: 20px;
            z-index: 1001;
        }
        #login-modal label, #login-modal input, #login-modal select {
            display: block;
            margin-bottom: 15px;
        }
        .section {
            background-color: #007bb8;
            padding: 10px;
            margin: 10px;
            border-radius: 8px;
            flex: 1 1 calc(50% - 20px);
            min-height: 150px;
        }
        .section-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .section h3 {
            margin: 0;
            padding: 10px 0;
        }
        .image-container {
            display: flex;
            justify-content: space-between;
            margin-top: 15px 0;
        }
        .image-wrapper {
            text-align: center;
            margin: 10px;
        }
        .image-text {
            margin: 5px 0;
        }
        .circular-image {
            width: 125px;
            height: 125px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #003366;
            padding: 2px;
            box-sizing: border-box;
        }
        .container {
            display: flex;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            justify-content: space-between;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }  
    </style>
</head>

<body>
<div id="inicio"></div>
<header>
    <img src="imagenes/genshinbuilds.webp" style="height: 50px; position: absolute; top: 20px; left: 20px;">
    <div class="header-container">
        <nav>
            <ul>
                <li><a href="#principio">Principio</a></li>
                <li><a href="#elementos">Elementos</a>
                    <ul>
                        <li><a href="#anemo">Anemo</a></li>
                        <li><a href="#cryo">Cryo</a></li>
                        <li><a href="#dendro">Dendro</a></li>
                        <li><a href="#electro">Electro</a></li>
                        <li><a href="#geo">Geo</a></li>
                        <li><a href="#hydro">Hydro</a></li>
                        <li><a href="#pyro">Pyro</a></li>
                    </ul>
                </li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
        <div class="search-container" style="display: flex; align-items: center;">
            <form action="#" method="GET" style="display: flex; align-items: center;">
                <input type="text" placeholder="Buscar..." name="search">
                <button type="submit">Buscar</button>
            </form>
            <div id="user-uid" style="margin-left: 20px; color: white;">
                <?php if ($uid): ?>
                    UID: <?php echo $uid; ?>
                <?php endif; ?>
            </div>
            <?php if (!$uid): ?>
                <button type="button" onclick="document.getElementById('login-modal').style.display='block'" style="margin-left: 20px;">Iniciar Sesión</button>
            <?php endif; ?>
        </div>
    </div>
</header>

<div id="login-modal">
    <h2 style="color: white;">Iniciar Sesión</h2>
    <form action="" method="POST">
        <label for="server">Servidor:</label>
        <select name="server" id="server" required>
            <option value="America">América</option>
            <option value="Europe">Europa</option>
            <option value="Asia">Asia</option>
            <option value="TW, HK, MO">TW, HK, MO</option>
        </select>
        
        <label for="uid">UID:</label>
        <input type="text" name="uid" id="uid" placeholder="Ingrese su UID" required pattern="\d*" title="Solo se permiten números">
        
        <label for="email">Gmail:</label>
        <input type="email" name="email" id="email" placeholder="Ingrese su Gmail" required>

        <button type="submit">Aceptar</button>
        <button type="button" onclick="document.getElementById('login-modal').style.display='none'">Cancelar</button>
    </form>
</div>

<div class="blur-background"></div>
<div class="content">
    <h2>Mejor Composición de Equipo</h2>
    <div class="section-container">
        <div class="container">
            <div class="section">
                <h3>Mejor Equipo para Émilie</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/alhacén.webp alt="Alhacén" class="circular-image">
                        <p class="image-text">Alhacén</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/émilie.webp alt="Émilie" class="circular-image">
                        <p class="image-text">Émilie</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Mualani</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/mualani.webp alt="Mualani" class="circular-image">
                        <p class="image-text">Mualani</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/dehya.webp alt="Dehya" class="circular-image">
                        <p class="image-text">Dehya</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/yaoyao.webp alt="YaoYao" class="circular-image">
                        <p class="image-text">YaoYao</p>
                    </div>
                </div>
            </div>


            <div class="section">
                <h3>Mejor Equipo para Clorinde</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/clorinde.webp alt="Clorinde" class="circular-image">
                        <p class="image-text">Clorinde</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/furina.webp alt="Furina" class="circular-image">
                        <p class="image-text">Furina</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/baizhu.webp alt="Baizhu" class="circular-image">
                        <p class="image-text">Baizhu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Arlecchino</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/arlecchino.webp alt="AArlecchino" class="circular-image">
                        <p class="image-text">Arlecchino</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Chiori</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/chiori.webp alt="Chiori" class="circular-image">
                        <p class="image-text">Chiori</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/furina.webp alt="Furina" class="circular-image">
                        <p class="image-text">Furina</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/gorou.webp alt="Gorou" class="circular-image">
                        <p class="image-text">Gorou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Gaming</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/gaming.webp alt="Gaming" class="circular-image">
                        <p class="image-text">Gaming</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/furina.webp alt="Furina" class="circular-image">
                        <p class="image-text">Furina</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xianyun.webp alt="Xianyun" class="circular-image">
                        <p class="image-text">Xianyun</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Nilou</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/barbara.webp alt="Bárbara" class="circular-image">
                        <p class="image-text">Bárbara</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nilou.webp alt="Nilou" class="circular-image">
                        <p class="image-text">Nilou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/yaoyao.webp alt="YaoYao" class="circular-image">
                        <p class="image-text">YaoYao</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Chevreuse</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/chevreuse.webp alt="Chevreuse" class="circular-image">
                        <p class="image-text">Chevreuse</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>


            <div class="section">
                <h3>Mejor Equipo para Xianyun</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/xiao.webp alt="Xiao" class="circular-image">
                        <p class="image-text">Xiao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/faruzan.webp alt="Faruzan" class="circular-image">
                        <p class="image-text">Faruzan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/xianyun.webp alt="Xianyun" class="circular-image">
                        <p class="image-text">Xianyun</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Navia</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/navia.webp alt="Navia" class="circular-image">
                        <p class="image-text">Navia</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Furina</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/neuvillette.webp alt="Neuvillette" class="circular-image">
                        <p class="image-text">Neuvillette</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/furina.webp alt="Furina" class="circular-image">
                        <p class="image-text">Furina</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Wriothesley</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/wriothesley.webp alt="Wriothesley" class="circular-image">
                        <p class="image-text">Wriothesley</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/ganyu.webp alt="Ganyu" class="circular-image">
                        <p class="image-text">Ganyu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xiangchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kokomi.webp alt="Kokomi" class="circular-image">
                        <p class="image-text">Sangonomiya Kokomi</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Neuvillette</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/neuvillette.webp alt="Neuvillette" class="circular-image">
                        <p class="image-text">Neuvillette</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/furina.webp alt="Furina" class="circular-image">
                        <p class="image-text">Furina</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Lynette</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/tartaglia.webp alt="Tartaglia" class="circular-image">
                        <p class="image-text">Tartaglia</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/lynette.webp alt="Lynette" class="circular-image">
                        <p class="image-text">Lynette</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>


            <div class="section">
                <h3>Mejor Equipo para Lyney</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/lyney.webp alt="Lyney" class="circular-image">
                        <p class="image-text">Lyney</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Kaveh</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/kaveh.webp alt="Kaveh" class="circular-image">
                        <p class="image-text">Kaveh</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/yaoyao.webp alt="YaoYao" class="circular-image">
                        <p class="image-text">YaoYao</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Kirara</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/alhacén.webp alt="Alhacén" class="circular-image">
                        <p class="image-text">Alhacén</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shogun.webp alt="" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kirara.webp alt="Kirara" class="circular-image">
                        <p class="image-text"></p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Baizhu</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ayato.webp alt="Ayato" class="circular-image">
                        <p class="image-text">Kamisato Ayato</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nilou.webp alt="Nilou" class="circular-image">
                        <p class="image-text">Nilou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/baizhu.webp alt="Baizhu" class="circular-image">
                        <p class="image-text">Baizhu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Dehya</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ganyu.webp alt="Ganyu" class="circular-image">
                        <p class="image-text">Ganyu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/dehya.webp alt="Dehya" class="circular-image">
                        <p class="image-text">Dehya</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Mika</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/eula.webp alt="Eula" class="circular-image">
                        <p class="image-text">Eula</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yaemiko.webp alt="Yae Miko" class="circular-image">
                        <p class="image-text">Yae Miko</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/mika.webp alt="Mika" class="circular-image">
                        <p class="image-text">Mika</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Eula</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/eula.webp alt="Eula" class="circular-image">
                        <p class="image-text">Eula</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Alhacén</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/alhacén.webp alt="Alhacén" class="circular-image">
                        <p class="image-text">Alhacén</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kuki.webp alt="Kuki" class="circular-image">
                        <p class="image-text">Kuki Shinobu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para YaoYao</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/alhacén.webp alt="Alhacén" class="circular-image">
                        <p class="image-text">Alhacén</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/yaoyao.webp alt="YaoYao" class="circular-image">
                        <p class="image-text">YaoYao</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Faruzán</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/trotamundos.webp alt="Trotamundos" class="circular-image">
                        <p class="image-text">Trotamundos</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/faruzan.webp alt="Faruzán" class="circular-image">
                        <p class="image-text">Faruzán</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Trotamundos</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/trotamundos.webp alt="Trotamundos" class="circular-image">
                        <p class="image-text">Trotamundos</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Layla</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ayaka.webp alt="Ayaka" class="circular-image">
                        <p class="image-text">Kamisato Ayaka</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shenhe.webp alt="Shenhe" class="circular-image">
                        <p class="image-text">Shenhe</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/layla.webp alt="Layla" class="circular-image">
                        <p class="image-text">Layla</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Nahida</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/baizhu.webp alt="Baizhu" class="circular-image">
                        <p class="image-text">Baizhu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Candace</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/candace.webp alt="Candace" class="circular-image">
                        <p class="image-text">Candace</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Cyno</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/cyno.webp alt="Cyno" class="circular-image">
                        <p class="image-text">Cyno</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/baizhu.webp alt="Baizhu" class="circular-image">
                        <p class="image-text">Baizhu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Collei</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/kokomi.webp alt="Kokomi" class="circular-image">
                        <p class="image-text">Sangonomiya Kokomi</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/collei.webp alt="Collei" class="circular-image">
                        <p class="image-text">Collei</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Tignari</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/tignari.webp alt="Tignari" class="circular-image">
                        <p class="image-text">Tignari</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yaemiko.webp alt="Yae Miko" class="circular-image">
                        <p class="image-text">Yae Miko</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Shikanoin Heizou</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/heizou.webp alt="Heizou" class="circular-image">
                        <p class="image-text">Shikanoin Heizou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/faruzan.webp alt="Faruzán" class="circular-image">
                        <p class="image-text">Faruzán</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>


            <div class="section">
                <h3>Mejor Equipo para Kuki Shinobu</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/cyno.webp alt="Cyno" class="circular-image">
                        <p class="image-text">Cyno</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kuki.webp alt="Kuki" class="circular-image">
                        <p class="image-text">Kuki Shinobu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Yelan</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/arlecchino.webp alt="Arlecchino" class="circular-image">
                        <p class="image-text">Arlecchino</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Kamisato Ayato</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ayato.webp alt="Ayato" class="circular-image">
                        <p class="image-text">Kamisato Ayato</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kuki.webp alt="Kuki" class="circular-image">
                        <p class="image-text">Kuki Shinobu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Yae Miko</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yaemiko.webp alt="Yae Miko" class="circular-image">
                        <p class="image-text">Yae Miko</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/sara.webp alt="Sara" class="circular-image">
                        <p class="image-text">Kujou Sara</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Yun Jin</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/yoimiya.webp alt="Yoimiya" class="circular-image">
                        <p class="image-text">Yoimiya</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yunjin.webp alt="Yun jin" class="circular-image">
                        <p class="image-text">Yun Jin</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Shenhe</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ayaka.webp alt="Ayaka" class="circular-image">
                        <p class="image-text">Kamisato Ayaka</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shenhe.webp alt="Shenhe" class="circular-image">
                        <p class="image-text">Shenhe</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kokomi.webp alt="Kokomi" class="circular-image">
                        <p class="image-text">Sangonomiya Kokomi</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Gorou</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/itto.webp alt="Itto" class="circular-image">
                        <p class="image-text">Arataki Itto</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/albedo.webp alt="Albedo" class="circular-image">
                        <p class="image-text">Albedo</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/gorou.webp alt="Gorou" class="circular-image">
                        <p class="image-text">Gorou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Thoma</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ayato.webp alt="Ayato" class="circular-image">
                        <p class="image-text">Kamisato Ayato</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/thoma.webp alt="Thoma" class="circular-image">
                        <p class="image-text">Thoma</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Arataki Itto</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/itto.webp alt="Itto" class="circular-image">
                        <p class="image-text">Arataki Itto</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/albedo.webp alt="albedo" class="circular-image">
                        <p class="image-text">Albedo</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/gorou.webp alt="Gorou" class="circular-image">
                        <p class="image-text">Gorou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Kujou Sara</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/beidou.webp alt="Beidou" class="circular-image">
                        <p class="image-text">Beidou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/sara.webp alt="Sara" class="circular-image">
                        <p class="image-text">Kujou Sara</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Sayu</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/xiao.webp alt="Xiao" class="circular-image">
                        <p class="image-text">Xiao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/chongyun.webp alt="Chongyun" class="circular-image">
                        <p class="image-text">Chongyun</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/sayu.webp alt="Sayu" class="circular-image">
                        <p class="image-text">Sayu</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Sangonomiya Kokomi</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kokomi.webp alt="Kokomi" class="circular-image">
                        <p class="image-text">Sangonomiya Kokomi</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Shogun Raiden</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/sara.webp alt="Sara" class="circular-image">
                        <p class="image-text">Kujou Sara</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Yoimiya</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/yoimiya.webp alt="Yoimiya" class="circular-image">
                        <p class="image-text">Yoimiya</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yunjin.webp alt="Yunjin" class="circular-image">
                        <p class="image-text">Yunjin</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Kamisato Ayaka</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ayaka.webp alt="Ayaka" class="circular-image">
                        <p class="image-text">Kamisato Ayaka</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/shenhe.webp alt="Shenhe" class="circular-image">
                        <p class="image-text">Shenhe</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kokomi.webp alt="Kokomi" class="circular-image">
                        <p class="image-text">Sangonomiya Kokomi</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Yanfei</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/yanfei.webp alt="Yanfei" class="circular-image">
                        <p class="image-text">Yanfei</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Xiangling</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/tartaglia.webp alt="Tartaglia" class="circular-image">
                        <p class="image-text">Tartaglia</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Diluc</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/diluc.webp alt="Diluc" class="circular-image">
                        <p class="image-text">Diluc</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Hu Tao</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/hutao.webp alt="Hu Tao" class="circular-image">
                        <p class="image-text">Hu Tao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/yelan.webp alt="Yelan" class="circular-image">
                        <p class="image-text">Yelan</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Klee</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/klee.webp alt="Klee" class="circular-image">
                        <p class="image-text">Klee</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Ninguang</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ninguang.webp alt="Ninguang" class="circular-image">
                        <p class="image-text">Ninguang</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Noelle</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/itto.webp alt="Itto" class="circular-image">
                        <p class="image-text">Arataki Itto</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/noelle.webp alt="Noelle" class="circular-image">
                        <p class="image-text">Noelle</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/gorou.webp alt="Gorou" class="circular-image">
                        <p class="image-text"></p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Albedo</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/itto.webp alt="Itto" class="circular-image">
                        <p class="image-text">Arataki Itto</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/albedo.webp alt="Albedo" class="circular-image">
                        <p class="image-text">Albedo</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/gorou.webp alt="Gorou" class="circular-image">
                        <p class="image-text">Gorou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Zhongli</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/neuvillette.webp alt="Neuvillette" class="circular-image">
                        <p class="image-text">Neuvillette</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/furina.webp alt="Furina" class="circular-image">
                        <p class="image-text">Furina</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Chongyun</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ayaka.webp alt="Ayaka" class="circular-image">
                        <p class="image-text">Kamisato Ayaka</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/chongyun.webp alt="Chongyun" class="circular-image">
                        <p class="image-text">Chongyun</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/jean.webp alt="Jean" class="circular-image">
                        <p class="image-text">Jean</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Razor</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/razor.webp alt="Razor" class="circular-image">
                        <p class="image-text">Razor</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/sacarosa.webp alt="Sacarosa" class="circular-image">
                        <p class="image-text">Sacarosa</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/qiqi.webp alt="Qiqi" class="circular-image">
                        <p class="image-text">Qiqi</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Diona</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/hutao.webp alt="Hu Tao" class="circular-image">
                        <p class="image-text">Hu Tao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/rosaria.webp alt="Rosaria" class="circular-image">
                        <p class="image-text">Rosaria</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/diona.webp alt="Diona" class="circular-image">
                        <p class="image-text">Diona</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Kaeya</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/hutao.webp alt="Hu Tao" class="circular-image">
                        <p class="image-text">Hu Tao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kaeya.webp alt="Kaeya" class="circular-image">
                        <p class="image-text">Kaeya</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Rosaria</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/hutao.webp alt="Hu Tao" class="circular-image">
                        <p class="image-text">Hu Tao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/rosaria.webp alt="Rosaria" class="circular-image">
                        <p class="image-text">Rosaria</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Qiqi</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/razor.webp alt="Razor" class="circular-image">
                        <p class="image-text">Razor</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/sacarosa.webp alt="Sacarosa" class="circular-image">
                        <p class="image-text">Sacarosa</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/qiqi.webp alt="Qiqi" class="circular-image">
                        <p class="image-text">Qiqi</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Ganyu</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/ayaka.webp alt="Ayaka" class="circular-image">
                        <p class="image-text">Kamisato Ayaka</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/ganyu.webp alt="Ganyu" class="circular-image">
                        <p class="image-text">Ganyu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Keching</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/keching.webp alt="Keching" class="circular-image">
                        <p class="image-text">Keching</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/fischl.webp alt="Fischl" class="circular-image">
                        <p class="image-text">Fischl</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/collei.webp alt="Collei" class="circular-image">
                        <p class="image-text">Collei</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Fischl</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/keching.webp alt="Keching" class="circular-image">
                        <p class="image-text">Keching</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/fischl.webp alt="Fischl" class="circular-image">
                        <p class="image-text">Fischl</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/nahida.webp alt="Nahida" class="circular-image">
                        <p class="image-text">Nahida</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Tartaglia</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/tartaglia.webp alt="Tartaglia" class="circular-image">
                        <p class="image-text">Tartaglia</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Mona</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/hutao.webp alt="Hu Tao" class="circular-image">
                        <p class="image-text">Hu Tao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/mona.webp alt="Mona" class="circular-image">
                        <p class="image-text">Mona</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/sacarosa.webp alt="Sacarosa" class="circular-image">
                        <p class="image-text">Sacarosa</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/diona.webp alt="Diona" class="circular-image">
                        <p class="image-text">Diona</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Beidou</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/beidou.webp alt="Beidou" class="circular-image">
                        <p class="image-text">Beidou</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/sara.webp alt="Sara" class="circular-image">
                        <p class="image-text">Kujou Sara</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Sacarosa</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/tartaglia.webp alt="Tartaglia" class="circular-image">
                        <p class="image-text">Tartaglia</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/sacarosa.webp alt="Sacarosa" class="circular-image">
                        <p class="image-text">Sacarosa</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Bárbara</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/hutao.webp alt="Hu Tao" class="circular-image">
                        <p class="image-text">Hu Tao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/venti.webp alt="Venti" class="circular-image">
                        <p class="image-text">Venti</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/barbara.webp alt="Bárbara" class="circular-image">
                        <p class="image-text">Bárbara</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Xingchiu</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xingchiu.webp alt="Xingchiu" class="circular-image">
                        <p class="image-text">Xingchiu</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Xiao</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/xiao.webp alt="Xiao" class="circular-image">
                        <p class="image-text">Xiao</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/faruzan.webp alt="Faruzán" class="circular-image">
                        <p class="image-text">Faruzán</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/xianyun.webp alt="Xianyun" class="circular-image">
                        <p class="image-text">Xianyun</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Bennett</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/tartaglia.webp alt="Tartaglia" class="circular-image">
                        <p class="image-text">Tartaglia</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/xiangling.webp alt="Xiangling" class="circular-image">
                        <p class="image-text">Xiangling</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/bennett.webp alt="Bennett" class="circular-image">
                        <p class="image-text">Bennett</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Venti</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/shogun.webp alt="Shogun" class="circular-image">
                        <p class="image-text">Shogun Raiden</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/collei.webp alt="Collei" class="circular-image">
                        <p class="image-text">Collei</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/venti.webp alt="Venti" class="circular-image">
                        <p class="image-text">Venti</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/kokomi.webp alt="Kokomi" class="circular-image">
                        <p class="image-text">Sangonomiya Kokomi</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Kaedehara Kazuha</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/neuvillette.webp alt="Neuvillette" class="circular-image">
                        <p class="image-text">Neuvillette</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/furina.webp alt="Furina" class="circular-image">
                        <p class="image-text">Furina</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/kazuha.webp alt="Kazuha" class="circular-image">
                        <p class="image-text">Kaedehara Kazuha</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/zhongli.webp alt="Zhongli" class="circular-image">
                        <p class="image-text">Zhongli</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Mejor Equipo para Jean</h3>
                <div class="image-container">
                    <div class="image-wrapper">
                        <p class="image-text">DPS Principal</p>
                        <img src=imagenes/keching.webp alt="Keching" class="circular-image">
                        <p class="image-text">Keching</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/chongyun.webp alt="Chongyun" class="circular-image">
                        <p class="image-text">Chongyun</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">DPS Secundario</p>
                        <img src=imagenes/diona.webp alt="Diona" class="circular-image">
                        <p class="image-text">Diona</p>
                    </div>
                    <div class="image-wrapper">
                        <p class="image-text">Soporte</p>
                        <img src=imagenes/jean.webp alt="Jean" class="circular-image">
                        <p class="image-text">Jean</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

</body>
</html>