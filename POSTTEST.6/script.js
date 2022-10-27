const toggle = document.getElementById('toggleDark');
const body = document.querySelector('body');

toggle.addEventListener('click', function(){
    this.classList.toggle('bi-moon');
    if(this.classList.toggle('bi-brightness-high-fill')){
        body.style.background = '#534340';
        body.style.color = 'black';
        body.style.transition = '2s';
    }else{
        body.style.background = '#2D2424';
        body.style.color = 'whitesmoke';
        body.style.transition = '2s';
    }
});

function a(){
    if(confirm("Do You Want To Order?")){
        alert("Order Accepted!")
    }
    else{
        alert("Order Canceled")
    }
}

const newspaperSpinning = [
    { transform: 'rotate(0) scale(1)' },
    { transform: 'rotate(360deg) scale(0)' }
  ];
  
  const newspaperTiming = {
    duration: 2000,
    iterations: 1,
  }
  
  const newspaper = document.querySelector(".newspaper, .newspaper2");
  
  newspaper.addEventListener('click', () => {
    newspaper.animate(newspaperSpinning, newspaperTiming);
  });
  
  //About Me
  function layer1(){
    document.getElementById('Foto').src="Gambar/Me2.jpeg";
}

function layer2(){
   document.getElementById('Foto').src="Gambar/Me.jpeg";
}
document.getElementById('Foto').addEventListener('mouseover', layer1);
document.getElementById('Foto').addEventListener('mouseout', layer2);