'use strict';

window.addEventListener('load', prepareColorPicker);

function prepareColorPicker() {
  // Varje fält ligger i ett `div`-element med klassen `field`.
  // Vi hämtar upp dem med `querySelectorAll`
  let fields = document.querySelectorAll('.field');
  // Sedan loopar vi igenom alla tre element
  for (let i = 0; i < fields.length; i++) {
    // För att hitta `input`-elementet i just denna `div` kan vi använda `querySelector` på `div`-elementet som vi hittar i `fields[i]`.
    let input = fields[i].querySelector('input');
    // Samma sak gäller `span`-elementet där värdet ska skrivas ut.
    let span = fields[i].querySelector('.value');
    // När sidan laddas vill vi slumpa fram en färg. Vi generar heltal mellan 0 och 255.
    input.value = Math.floor(Math.random()*256);
    // Sedan lägger vi även samma värde som `textContent` på `span`-elementet
    span.textContent = input.value;
    // Till sist lägger vi en lyssnare på "input"-händelsen. Denna lyssnare kommer triggas när användaren drar i reglaget på `input`-elementet.
    fields[i].addEventListener('input', handleValueChange);
  }
  // Efter att vi nu satt slumpmässiga värden på de tre färgkanelerna uppdaterar vi bakgrundsfärgen. Vi har gjort en egen funktion för detta eftersom vi även vill anropa den när användaren drar i reglagen.
  updateBackground();
}

// Denna funktion körs när användaren drar i reglaget på ett av `input`-elementen.
function handleValueChange(event) {
  // `event.currentTarget` innehåller elementet som lyssnaren ligger på.
  // På detta kan vi köra `querySelector` för att hämta ut `span`-elementet.
  let span = event.currentTarget.querySelector('.value');
  // Vi uppdaterar texten i `span`-elementet med det nya fältvärdet.
  span.textContent = event.target.value;
  // Sedan uppdaterar vi bakgrundsfärgen.
  updateBackground();
}

// Denna funktion uppdaterar bakgrundsfärgen baserat på värdena i `input`-fälten.
function updateBackground() {
  // Vi hämtar ut värdena genom att köra `querySelector` baserat på elementens id:n.
  let red = document.querySelector('#red').value;
  let green = document.querySelector('#green').value;
  let blue = document.querySelector('#blue').value;
  // Vi sätter ihop de tre värdena till en CSS-färg.
  let newValue = 'rgb(' + red + ',' + green + ',' + blue + ')';
  // Vi uppdaterar värdet på background-color på `body`-elementet.
  document.body.style.backgroundColor = newValue;
}
