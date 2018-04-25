var canvas = new fabric.StaticCanvas('c');
var image;
var imgEl = document.createElement('img');
var currentRotation = 0;
var currentColorCode = '#1E4F9B';
var currentSeleeve = 0;
var currentCollar = 0;
var selectedColorCode = '#1E4F9B';
var selectedSeleeve = 'Full';
var selectedCollar = 'Traditional Button Down';
var selectedImg = '';
var selectedFolder = ['blue','red'];
var selectedFolderNumber = 0;
// blue color image
var imgArray = [];
imgArray[0] = [];
imgArray[0][0] = '1-1.png';
imgArray[0][1] = '1-2.png';
imgArray[0][2] = '1-3.png';
imgArray[1] = [];
imgArray[1][0] = '2-1.png';
imgArray[1][1] = '2-2.png';
imgArray[1][2] = '2-3.png';


function init() {
    selectedImg = 'img/'+selectedFolder[selectedFolderNumber]+'/'+imgArray[currentSeleeve][currentCollar];
    imgEl.crossOrigin = 'anonymous';
    imgEl.onload = function() {
      image = new fabric.Image(imgEl);
      image.filters = [new fabric.Image.filters.HueRotation()];
      canvas.clear();
      canvas.add(image);
      reflat(currentRotation);
    }
    imgEl.src = selectedImg;
    
    $('#selectedCollar').html(selectedCollar);
    $('#selectedSleeve').html(selectedSeleeve);
    $("#selectedColor").css("background-color",selectedColorCode);
}

function reflat(rotation) {
  image.filters[0].rotation = 0;
  image.applyFilters();
  canvas.requestRenderAll();
  image.filters[0].rotation = rotation;
  image.applyFilters();
  canvas.requestRenderAll();
}

function changeColor(selectedNumber,color,rotation, el) {
      selectedFolderNumber = selectedNumber;
      if(el) {    
        $('.selectedColor').removeClass('selectedColor');
        $(el).addClass('selectedColor');
      }
      currentRotation = rotation;
      currentColorCode = color;
      selectedColorCode = color;
      init();
}

function changeSleeves(seleeve,sleeveName) {
  currentSeleeve = seleeve-1;
  selectedSeleeve = sleeveName;
  init();
}

function changeCollar(collar,collarName) {
  currentCollar = collar-1;
  selectedCollar = collarName;
  init();
}

  function sendValueToPhp(){
    console.log('oski..');
    //var currentsize = document.getElementById('chest').value;
    var anote = document.getElementById('anote').value;
    window.location.href="index.php?Page=Order&collar=" + currentCollar + "&seleeve=" +currentSeleeve + "&color="+encodeURIComponent(currentColorCode)+"&anote="+anote;
  }