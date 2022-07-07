
        let myForm = document.getElementById("form");

        myForm.addEventListener('submit', function(e) {

            let inputLastname = document.getElementById('lastname');
            let myRegex = /^[a-zA-Z-\s]+$/;
            let number = /[a-zA-Z0-9?!@#$%^&*-=&]{3,25}/;


            //Condition Lastname

            if (inputLastname.value.trim() == "") { //champs vide

                let myError = document.getElementById("errorLastname");
                myError.innerHTML = "Le champ du nom est requis";
                myError.style.color = 'red';
                e.preventDefault();

            }else if (myRegex.test(inputLastname.value) == false ){ //lettre

                let myError = document.getElementById("errorLastname");
                myError.innerHTML = "Le nom doit comporter que des lettres";
                myError.style.color = 'red';
                e.preventDefault();

            
            }else if (number.test(inputLastname.value) == false ){ //entre 3 - 20 caracteres

                let myError = document.getElementById("errorLastname");
                myError.innerHTML = "Le nom doit comporter entre 3 et 20 carateres";
                myError.style.color = 'red';
                e.preventDefault();

            }
        
        });

            //Condition Name

        myForm.addEventListener('submit', function(e) {

            let inputName = document.getElementById('name');
            let myRegex = /^[a-zA-Z-\s]+$/;
            let number = /[a-zA-Z0-9?!@#$%^&*-=&]{3,25}/;



            if (inputName.value.trim() == "") { //champs vide

                let myError = document.getElementById("errorName");
                myError.innerHTML = "Le champ du prénom est requis";
                myError.style.color = 'red';
                e.preventDefault();

            }else if (myRegex.test(inputName.value) == false ){ //lettre

                let myError = document.getElementById("errorName");
                myError.innerHTML = "Le prénom doit comporter que des lettres";
                myError.style.color = 'red';
                e.preventDefault();

            
            }else if (number.test(inputName.value) == false ){ //entre 3 - 20 caracteres

                let myError = document.getElementById("errorName");
                myError.innerHTML = "Le prénom doit comporter entre 3 et 20 carateres";
                myError.style.color = 'red';
                e.preventDefault();

            }
        
        });

                    //Condition email

        myForm.addEventListener('submit', function(e) {

            let inputEmail = document.getElementById('email');
            let myRegex = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;


            if (inputEmail.value.trim() == "") { //champs vide

                let myError = document.getElementById("errorEmail");
                myError.innerHTML = "Le champ de l'email est requis";
                myError.style.color = 'red';
                e.preventDefault();

            }else if (myRegex.test(inputEmail.value) == false ){ //lettre

                let myError = document.getElementById("errorEmail");
                myError.innerHTML = "Veuillez rentrer une email valide";
                myError.style.color = 'red';
                e.preventDefault();


            }

        });

        myForm.addEventListener('submit', function(e) {

            let inputPseudo = document.getElementById('pseudo');
            let number = /^.{3,10}$/;
        
        
        
            if (inputPseudo.value.trim() == "") { //champs vide
        
                let myError = document.getElementById("errorPseudo");
                myError.innerHTML = "Le champ du pseudo est requis";
                myError.style.color = 'red';
                e.preventDefault();
        
            }else if (number.test(inputPseudo.value) == false ){ //entre 3 - 20 caracteres
        
                let myError = document.getElementById("errorPseudo");
                myError.innerHTML = "Le pseudo doit comporter entre 3 et 25 carateres";
                myError.style.color = 'red';
                e.preventDefault();
            }
        
        });

        myForm.addEventListener('submit', function(e) {

            let myInput = document.getElementById('password');
            let myRepass = document.getElementById('repass');
            let myRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,25})/;
            
        
            if (myInput.value.trim() == "") {
        
                let myError = document.getElementById("errorPassword");
                myError.innerHTML = "Le champ du nom est requis";
                myError.style.color = 'red';
                e.preventDefault();
        
            }
            if (myRegex.test(myInput.value) == false ){
        
                let myError = document.getElementById("errorPassword");
                myError.innerHTML = "Veuillez entrez entre 6 et 25 caractères, min 1 majuscule, 1 minuscule, 1 chiffre, 1 caratère spécial";
                myError.style.color = 'red';
                e.preventDefault();
            
            }

            if (myInput.value.trim() != myRepass.value.trim()) { //champs vide

                let myError = document.getElementById("errorRepass");
                myError.innerHTML = "Les 2 Mot de passes doivent etre identique";
                myError.style.color = 'red';
                e.preventDefault();

            }

        
        });
        

        const pass = document.querySelector('#password')
        const repass = document.querySelector('#repass')
        const button = document.querySelector('#visiblity-toggle')
        const btn = document.querySelector('#re-visiblity-toggle')

        button.addEventListener('click', () => {
            if (pass.type === "text") {
                pass.type = "password";
                button.innerHTML = "visibility_off";
            } else {
                pass.type = "text";
                button.innerHTML = "visibility";

            }
        })
        btn.addEventListener('click', () => {
            if (repass.type === "text") {
                repass.type = "password";
                btn.innerHTML = "visibility_off";
            } else {
                repass.type = "text";
                btn.innerHTML = "visibility";

            }
        })