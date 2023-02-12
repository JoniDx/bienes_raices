document.addEventListener('DOMContentLoaded', function(){
    eventLiteners();
    darkMode();
});

function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    })

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    })
}

// Inicio Otra froma del dark cuando pasas a ora vista no se pierde

/*function darkMode(){
 
        
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme-dark)');
    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
        
    prefiereDarkMode.addEventListener('change', function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });
 
    //--console.log(prefiereDarkMode.matches);
        //--Boton DarkMode
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode'); 
 
        //--Para que el modo elegido se quede guardado en local-storage
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('modo-oscuro','true');
        } else {
            localStorage.setItem('modo-oscuro','false');
        }
    });
 
    //--Obtenemos el modo del color actual
    if (localStorage.getItem('modo-oscuro') === 'true') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
}*/

// Fin Otra froma del dark cuando pasas a ora vista no se pierde

function eventLiteners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}