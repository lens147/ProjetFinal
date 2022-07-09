<?php include('./vue/layout/head.php');?>


<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container my-5">
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background-color: #45526e"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              BICHE
            </h6>
            <p class="text-center">
              BICHE est une place de marché qui permet aux amateurs d'art de découvrir de nouveaux artistes.
              BICHE souhaite aider les artistes de talent à développer leur diffusion et trouver de nouveaux collectionneurs grâce au Web.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Productions</h6>
            <div>
              <p href="" class="text-white">Bootstrap 5</p>
            </div>
            <div>
              <p href="" class="text-white">Google Apis</p>
            </div>
            <div>
              <p href="" class="text-white">JavaScript</p>
            </div>
            <div>
              <p href="" class="text-white">PHP</p>
            </div>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Lien usuels
            </h6>
            <p>
              <a href="http://localhost/CCP/projetFinal/accueil" class="text-white">Accueil</a>
            </p>
            <p>
              <a href="http://localhost/CCP/projetFinal/oeuvre" class="text-white">Oeuvre</a>
            </p>
            <p>
                <?php if(isset($connect)){echo '<a class="text-white" href="./compte">Mon Compte</a>';}?>
            </p>
            <p>
                <?php if(isset($connect)){echo '<a class="text-white" href="./admin">Mon Panel</a>';}?>
            </p>
            <p>
              <a target="_blank" href="http://localhost/CCP/projetFinal/mentionsLegal" class="text-white">Mentions Légales</a>
            </p>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> 14, Rue de la belle oeuvre, 88000 Épinal, FR</p>
            <p><i class="fas fa-envelope mr-3"></i> lemaral2931@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 33 6 14 02 20 22</p>
            <p><i class="fas fa-print mr-3"></i> + 33 3 29 89 87 35</p>
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <!-- Copyright -->
            <div class="p-3">
              © 2022 Copyright
            </div>
            <!-- Copyright -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <!-- Facebook -->
            <a target="_blank" href="https://www.facebook.com/people/Biche-Galerie-dArt/100083031346084/"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-facebook-f"></i
              ></a>

            <!-- Twitter -->
            <a target="_blank" href="https://twitter.com/lorsres"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-twitter"></i
              ></a>

            <!-- Instagram -->
            <a target="_blank" href="https://www.instagram.com/bubupour/"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-instagram"></i
              ></a>
          </div>
          <!-- Grid column -->
        </div>
      </section>
      <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->
</div>
<!-- End of .container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>