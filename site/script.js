
var mode = 1;

var modeSwitch = document.querySelector('.mode-switch');
modeSwitch.addEventListener('click', function () {                      
    
    document.documentElement.classList.toggle('light');

    if(localStorage.getItem("mode") == "l" && (mode % 2) == 0){
        
        console.log("agr d");
        localStorage.setItem("mode", "d");
        mode++;
        
    } else {
        console.log("agr l");
        localStorage.setItem("mode", "l");
        mode--;
    }
    
    modeSwitch.classList.toggle('active');
});


if(localStorage.getItem("mode") == "l"){
        
        console.log("l");
        document.querySelector('.mode-switch').click()
        
    } else {
        
        console.log("da");
        
    }
