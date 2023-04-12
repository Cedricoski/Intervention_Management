import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';
import Turbolinks from 'turbolinks';


Turbolinks.start();


Turbolinks.setProgressBarDelay(50)

$(document).ready(function() {
    if (window.location.href.indexOf("home") > -1) {
        Turbolinks.visit('/home')
    }else if (window.location.href.indexOf("interventions") > -1) {
        Turbolinks.visit('/interventions')
    }else if (window.location.href.indexOf("users") > -1) {
        Turbolinks.visit('/users')
    }else if(window.location.href.indexOf("solutions") > -1) {
        Turbolinks.visit('/solutions')
    }else if(window.location.href.indexOf("clients") > -1) {
        Turbolinks.visit('/clients')
    }
  });
  $(document).ready(function() {
    
  });
  $(document).ready(function() {
    
  });
document.addEventListener('turbolinks:load', function () {
    
    Livewire.restart();
    
    
        
})





document.addEventListener('DOMContentLoaded',function(){

   
    window.Alpine = Alpine
    Alpine.start();
    
    
    
})



















