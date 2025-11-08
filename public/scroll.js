const rootElement = document.querySelector(":root");
const audioIcon = document.querySelector('.audi-icon');
const icon = document.querySelector('.audi-icon i');
const music = document.querySelector('#song');
let playsAudio = false;

function disableScroll(){
    topScroll = window.pageYOffset || document.documentElement.topScroll;
    leftScroll = window.pageXOffset || document.documentElement.leftScroll;

    window.onscroll = function(){
        window.scrollTo(topScroll, leftScroll);
    }
    
    rootElement.style.scrollBehavior = 'auto';
}

function enableScroll(){
    window.onscroll = function(){}
    rootElement.style.scrollBehavior = 'smooth';
    playAudio();
}

function playAudio(){
    music.volume = 0.9;
    audioIcon.style.display = 'flex';
    music.play();
    playsAudio = true;
}

audioIcon.onclick = function(){
    if(playsAudio){
        music.pause();
        icon.classList.remove('bi-disc');
        icon.classList.add('bi-pause-circle');
    }else{
        music.play();
        icon.classList.remove('bi-pause-circle');
        icon.classList.add('bi-disc');
    }

    playsAudio = !playsAudio;
}

disableScroll();