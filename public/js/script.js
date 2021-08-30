//counter


//-------------------------------
var allquestions = document.querySelectorAll('.theQuestion');
console.log(allquestions[2]);

var nextButton = document.querySelector('#next');
var lastButton = document.querySelector('#last');
console.log(nextButton, lastButton)
var lengthArray = allquestions.length;


let i = 0;
nextButton.addEventListener('click',(e)=> {
  e.preventDefault();
  if ( i < allquestions.length-1) {
    if(!allquestions[i].classList.contains('hidden')){
      console.log(i+ " debut");
      allquestions[i].classList.add('hidden');
      allquestions[i+1].classList.remove('hidden');
     
      i++;

    } else if(allquestions[i].classList.contains('hidden')) {
      allquestions[i].classList.remove('hidden');
      allquestions[i+1].classList.add('hidden');
      i++;
    }
    console.log("..."+i)
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
      console.log(i+ " debut................");
      allquestions[i-1].classList.remove('hidden');
      allquestions[i].classList.add('hidden');
      i--;
    } else if(allquestions[i].classList.contains('hidden')) {
      allquestions[i-1].classList.add('hidden');
      allquestions[i].classList.remove('hidden');
      i--;
    }
    console.log("..."+i)
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

  document.getElementById('timer').textContent = minutes + ":" + secondes;
  setTimeout('timer()', 1000);
}
totalSecs = 0;

window.addEventListener('load', (e) => {
      timer();
});

