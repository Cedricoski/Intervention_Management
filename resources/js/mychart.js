import Chart from 'chart.js/auto';

document.addEventListener('turbolinks:load',function(){
    if (window.location.href.indexOf("home") > -1) {
         
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: '#6366f1',
                borderColor: '#6366f1',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

       
       

        new Chart(
            document.getElementById('myChart'),
            config
        );

        
    }
})
    

    
    