
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Accueil</title>
    <?php include '../include/nav_front.php' ?>
</head>

<body id="body">



<div  style="background-image: url('images/imagefond.png'); background-size: cover;  background-color:aqua;height: 1000px; width: 100%;background-repeat: no-repeat;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col text-center">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
            
            <h1 style="font-size: 6em; color: white; margin-left: -450px; margin-top: 200px;font-family: RapScript">Bienvenue chez YasoSho<span style="color:chartreuse;">P</span> !</h1>
            <h2 style="font-size: 3em; color: white; margin-left: -450px; margin-top: 10px;font-family: RapScript, cursive;">Votre shopping mode simplifié. </h2 >
            
          </div>
    </div>
    <br>
    
    <a href="pageproduit.php" type="button" class="btn btn-success rounded-pill" style="margin-left: 900px; background-color:chartreuse; ">Commencer mes achats</a>
       
</div>





        
</body>



        
<br>
       
        
<div class="container-fluid bg-orange text-light p-5" style="background-color: #ff7f00;  background-image: url(''); background-repeat: no-repeat; background-position: right center;" id="div1" >
  <div class="row">
    <div class="col-md-6">
      <h1>Bienvenue sur Yasoshop, votre destination en ligne pour des achats pratiques et faciles !</h1>
      <p>Nous sommes une entreprise passionnée par la qualité, la valeur et le service à la clientèle exceptionnel.</p>
      <p>Notre mission est de fournir à nos clients une expérience d'achat en ligne rapide, simple et pratique, tout en offrant une sélection de produits de qualité supérieure à des prix abordables.</p>
      <a href="#qualite" class="btn btn-light mt-3">En savoir plus</a>
    </div>
    <div class="col-md-6">
      <div class="card bg-light">
        <div class="card-body">
          <h2 class="card-title" >Notre engagement envers la qualité</h2>
          <p class="card-text">Chez Yasoshop, nous sommes déterminés à maintenir les normes de qualité les plus élevées pour tous les produits que nous proposons. Nous travaillons avec des fournisseurs de confiance pour vous offrir des produits de qualité supérieure qui répondent à vos besoins et à vos attentes.</p>
        </div>
      </div>
      <div class="card bg-light mt-3">
        <div class="card-body">
          <h2 class="card-title">Notre service clientèle</h2>
          <p class="card-text">Notre équipe de service à la clientèle est disponible pour répondre à toutes vos questions et préoccupations. Nous sommes engagés à offrir un excellent service à la clientèle avant, pendant et après votre achat.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid bg-orange text-light p-5 " style="background-color: #ff7f00;" id="div1">
  <div class="row">
    <div class="col-md-12">
      <h2 id="qualite">Notre engagement envers la qualité</h2>
      <p>Chez Yasoshop, nous sommes fiers de notre engagement envers nos clients et nous nous efforçons de leur offrir une expérience de magasinage en ligne agréable et transparente.</p>
      <p>Nous sommes déterminés à maintenir les normes de qualité les plus élevées pour tous les produits que nous proposons.</p>
      <a href="#top" class="btn btn-primary mt-3">Retour en haut de la page</a>
    </div>
  </div>
</div>
    
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
<footer id="footer" class="footer" style=" position: absolute; bottom: 0; width: 100%; height: 60px; line-height: 60px;">
        <br>
     
        <br>
        <br>
        <br>
        <br>
     
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
     
        <br>
        <br>
        <br>
        <br>
        
        
        
        
        
        
        

  
  
  
  
  
  
  
  
        <div class="container" style=" background-color:chartreuse; width: 100%; height:100 ">
    <div class="row">
        
      <div class="col-md-6" >
        <h3>Contactez-nous</h3>
        <p>Vous pouvez nous contacter par téléphone, email ou en remplissant le formulaire de contact ci-dessous :</p>
        <ul class="contact-info">
          <li><i class="fa fa-phone"></i> Téléphone: +33 6 50 01 51 67</li>
          <li><i class="fa fa-envelope"></i> Email: yassine.aitalla@imie-paris.fr</li>
        </ul>
      </div>
      <div class="col-md-6">
        <h3>Formulaire de contact</h3>
        <form action="envoyer_mail.php" method="post" onsubmit="return envoyerMail()";>
          <div class="form-group">


          <script>
          function envoyerMail() {
          // Code pour envoyer le message
          // ...

                // Afficher la boîte de dialogue
                var alertBox = alert('Votre message à bien était envoyé');
                alertBox.className = "alert-box"; // ajouter la classe CSS

        // Empêcher la soumission du formulaire
        return false;
      }
      </script>

        <style>

      .alert-box {
        background-color: #ff7f00; /* couleur bleue */
        color: #fff; /* texte en blanc */
        border: none; /* enlever la bordure */
        padding: 10px; /* ajouter un peu d'espace intérieur */
        font-size: 18px; /* augmenter la taille de la police */
      }

      </style>

      
           <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" required>
          </div>
          <div class="form-group">
            <label for="email">Veuillez saisir notre Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" placeholder="Entrez votre message" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
      </div>
    </div>
  </div>

  <br>
  
  <div style="background-color:#7b78ff; text-align:center; width: 100%; height:100;">
  <label for="name" style="position:relative; display:inline-block; color:#fff ">
    Copyright © 2023 YasoShop
    <span style="position:absolute; right:-20px; top:50%; transform:translateY(-50%);">
    <a href="#body"> <i class="fas fa-chevron-up" ></i></a> 
   
    </span>
  </label>
</div>

  
</footer>

</html>


