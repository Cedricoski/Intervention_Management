import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';
import Turbolinks from 'turbolinks';


Turbolinks.start();


Turbolinks.setProgressBarDelay(50)

document.addEventListener('turbolinks:load', function () {
    
    Livewire.restart();
    
    
        
})





document.addEventListener('DOMContentLoaded',function(){

    
    window.Alpine = Alpine
    Alpine.start();
    
    
    
})

















