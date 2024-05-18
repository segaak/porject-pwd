<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vatika Yayasan</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    header {
      background: url(border.jpeg) center/cover no-repeat;
      color: white;
      text-align: center;
      padding: 4rem 0;
      position: relative;
    }

    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background: rgba(0, 0, 0, .5);
    }

    header h1 {
      font-size: 3.5rem;
      margin-bottom: 1rem;
    }

    nav {
  background-color:deepskyblue;
}
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  max-width: 1200px;
  margin: 0 auto;
} 
     .logo a {
      text-decoration: none;
      color: #ffffff;
      font-size: 1.5rem;
      font-weight: bold;
    }

    .menu {
      list-style-type: none;
      display: flex;
    }

    .menu li {
      margin: 0 1rem;
    }

    .menu li a {
      text-decoration: none;
      color: #ffffff;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    .menu li a:hover {
      color: #ffcc00;
    }

    main {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 1rem;
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, .3);
    } 

    .destinasi {
      margin-bottom: 2rem;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: flex-start;
      text-align: center;
    }

    .destinasi h2 {
      font-size: 24px;
      margin-bottom: 1rem;
      width: 100%;
    }

    .destinasi-item {
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, .5);
      margin: 0.5rem;
      max-width: 300px;
      margin-right: 5px;
      margin-left: 5px;
      padding: 1rem;
      border-radius: 5px;
      flex: 1;
      text-align: center;
    }

    .destinasi-item:hover {
      transform: scale(1.1);
    }

    .destinasi-item img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
    }

    .destinasi-item h3 {
      font-size: 1.5rem;
      margin: 0.5rem 0;
    } */
/* 
    .paket {
      margin-bottom: 2rem;
      text-align: center;
    }

    .paket h2 {
      font-size: 24px;
      margin-bottom: 1rem;
    }

    .paket-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .paket-item {
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, .5);
      flex: 1;
      width: calc(33.33% - 1rem);
      margin-bottom: 1rem;
      margin-right: 20px;
      margin-left: 20px;
      padding: 1rem;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .paket-item:hover {
      transform: scale(1.1);
    }

    .paket-item img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
    }

    .paket-item h3 {
      font-size: 1.2rem;
      margin: 0.5rem 0;
    }

    .paket-item p {
      font-size: 0.8rem;
      margin: 0.5rem 0;
    }

    .pesan {
      margin-bottom: 2rem;
      text-align: center;
    }

    .card-body {

      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, .5);
      flex: 1;
      width: 96.5%;
      margin-bottom: 1rem;
      margin-right: 20px;
      margin-left: 20px;
      padding: 1rem;
      text-align: center;
      transition: transform 0.3s ease;
    }  */
    main {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 1rem;
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, .3);
    } 
    .paket-wisata{
  margin-bottom: 2rem;
  text-align: center;
}
.paket-wisata h2{
  font-size: 24px;
  margin-bottom: 1rem;
}
.paket-wisata-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.paket-wisata-item {
  background-color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, .5);
  flex: 1;
  width: calc(33.33% - 1rem);
  margin-bottom: 1rem;
  margin-right: 20px;
  margin-left: 20px;
  padding: 1rem;
  text-align: center;
  transition: transform 0.3s ease;
}
.paket-wisata-item:hover {
  transform: scale(1.1);
}
.paket-wisata-item img {
  max-width: 100%;
  height: auto;
  border-radius: 5px;
}
.paket-wisata-item h3{
  font-size: 1.2rem;
  margin: 0.5rem 0;
}
.paket-wisata-item p{
  font-size: 0.8rem;
  margin: 0.5rem 0;
  text-align: justify;
}

    .bg-body-tertiary {
  background-color:  deepskyblue !important; /* Ini akan menimpa gaya inline */
}
   
    
  </style>
</head>

<body>
  <header>
    <h1>Vatika Yayasan</h1>

  </header>
  <nav>
        <div class="navbar">
            <div class="logo">
                <img src="" alt="a" srcset="">
                <a href="index.php">Vatika Yayasan</a>
            </div>
            <ul class="menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="login.php">Donasi</a></li>
                <li><a href="contact.php">CP</a></li>
            </ul>
        </div>
    </nav>
  
<!-- 
 
    <selection class="destinasi"> -->
      <!-- <h2>Destinasi Wisata</h2>
      <div class="destinasi-item">
        <img src="sleman.jpeg" alt="Destinasi 1">
        <h3>Sleman</h3>
      </div>
      <div class="destinasi-item">
        <img src="jogja.jpeg" alt="Destinasi 1">
        <h3>Yogyakarta</h3>
      </div>
      <div class="destinasi-item">
        <img src="kulonprogo.jpeg" alt="Destinasi 1">
        <h3>Kulon Progo</h3>
      </div>
      <div class="destinasi-item">
        <img src="bantul.jpeg" alt="Destinasi 1">
        <h3>Bantul</h3>
      </div>
      <div class="destinasi-item">
        <img src="gunungkidul.jpeg" alt="Destinasi 1">
        <h3>Gunung Kidul</h3>
      </div> -->
      <main>
      <selection class="paket-wisata">
            <h2>Konten</h2>
            <div class="paket-wisata-container">
                
                <div class="paket-wisata-item">
                    <img src="2.jpeg" alt="Paket Wisata 2">
                    <h3>Pembahasan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab consequatur ipsam aspernatur consequuntur libero quaerat modi molestiae temporibus tempore sequi. Voluptatibus aliquid excepturi amet alias expedita sapiente doloremque consequuntur eum!</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="8.jpeg" alt="Paket Wisata 4">
                    <h3>Pembangunan</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, iste consequuntur ut aut assumenda repudiandae fugiat laborum nam voluptas facilis veniam ullam soluta excepturi consequatur reiciendis, blanditiis accusantium distinctio eos.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Pemeliharaan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum eveniet eos impedit. Natus neque, velit est eaque commodi saepe iure odit ea cupiditate! Labore nam alias obcaecati minima assumenda?</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </selection>
        </main>
<!-- 
      <section class="hero" id="home">
    <h1 class="text-center" style="margin-top: 30px; margin-bottom: 50px;">paket</h1>
    
    <div class="row justify-content-center" id="card-grid">
      <div class="card text-bg-light mb-3 mx-3 shadow-lg" style="max-width: 17rem;">
        <div class="card-header">
          <h5 class="card-title text-center">Pembahasan</h5>
         
        </div>
        <div class="card-body">
          <p class="card-text">
          aaa
          </p>
          <div class="text-center">
          <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="card text-bg-light mb-3 mx-3 shadow-lg" style="max-width: 17rem;">
        <div class="card-header">
          <h5 class="card-title text-center">Pembangunan</h5>
         
        </div>
        <div class="card-body">
          <p class="card-text">
            oi
          </p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card text-bg-light mb-3 mx-3 shadow-lg" style="max-width: 17rem;">
        <div class="card-header">
          <h5 class="card-title text-center">Pemeliharaan</h5>
        </div>
        <div class="card-body">
          <p class="card-text">
            aaa
          </p>
          <a href="#" class="btn btn-primary" >Go somewhere</a>
        </div>
  </div>
     
      
      </div>
    </div>
  </section> -->
        

    <!-- </selection>
  </main> -->
</body>

</html>