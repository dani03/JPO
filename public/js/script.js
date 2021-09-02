//counter


//-------------------------------
var allquestions = document.querySelectorAll('.theQuestion');


var nextButton = document.querySelector('#next');
var lastButton = document.querySelector('#last');

var lengthArray = allquestions.length;


let i = 0;
nextButton.addEventListener('click',(e)=> {
  e.preventDefault();
  if ( i < allquestions.length-1) {
    if(!allquestions[i].classList.contains('hidden')){
      allquestions[i].classList.add('hidden');
      allquestions[i+1].classList.remove('hidden');
     
      i++;

    } else if(allquestions[i].classList.contains('hidden')) {
      allquestions[i].classList.remove('hidden');
      allquestions[i+1].classList.add('hidden');
      i++;
    }
  } else {
    var terminer = document.querySelector('#valider');
    if(terminer.classList.contains('hidden')) {
      terminer.classList.remove('hidden')
    } else{
      terminer.classList.add('hidden')

    }

  }
  
});


lastButton.addEventListener('click',(e)=> {
  e.preventDefault();
  if ( i >= 0) {
    if(!allquestions[i].classList.contains('hidden')){
      allquestions[i-1].classList.remove('hidden');
      allquestions[i].classList.add('hidden');
      i--;
    } else if(allquestions[i].classList.contains('hidden')) {
      allquestions[i-1].classList.add('hidden');
      allquestions[i].classList.remove('hidden');
      i--;
    }

  } else {
    var terminer = document.querySelector('#valider');
    if(terminer.classList.contains('hidden')) {
      terminer.classList.remove('hidden')
    } else{
      terminer.classList.add('hidden')

    }
  }
  
  
});

//counter
function timer() {

  var minutes = Math.floor(totalSecs / 60);
  var secondes = totalSecs % 60;
  if(secondes <= 9) secondes = "0" + secondes;
  if(minutes <= 9) minutes = "0" + minutes;
  totalSecs++;

  document.getElementById('timer').value = minutes + ":" + secondes;
  document.getElementById('timer2').value = "00:"+ minutes + ":" + secondes;
  setTimeout('timer()', 1000);
}
totalSecs = 0;

window.addEventListener('load', (e) => {
      timer();
});

