import { useState } from "react";
import Footer from "./component/Footer"
import Header from "./component/Header"
import Input from "./component/Input"

function App() {

  const [unit, setUnit] = useState('k');
  const [weight, setWeight] = useState('');

  const toLbs = (kilos) => kilos * 2.2;
  const toKilos = (lbs) => lbs * 0.45;

  const handleKilosChange = (weight) => {
    setUnit('l'); // l'unité vers la quelle je veux convertir
    setWeight(weight); // le poids actuel est en kilos
  }

  const handlePoundsChange = (weight) => {
    setUnit('k'); // l'unité vers la quelle je veux convertir
    setWeight(weight); // le poids actuel est en kilos
  }

  const convert = (weight, convertFunction) => {

   // weight c'est le poids à partir duquel je vais convertir
    // convertMethod c'est la méthode à appeler pour faire la conversion
    const inputValue = parseFloat(weight);

    // si la valeur de l'input type text récupérée n'est pas un chiffre
    // ce que je renvoie c'est du vide
    // en gros je vais pas convetir une valeur qui n'est pas un chiffre
    if(Number.isNaN(inputValue)) {
      return '';
    }

    // si la valeur de l'input type text est bien un chiffre
    // j'appel la méthode de conversion récupérée en argument
    // convertMethod appel soit toLbs soit toKIlos
    const result = convertFunction(inputValue);
    // j'arrondi a deux chiffre après la virgule le resultat
    const roundedResult = Math.round(result, 2);
    // je renvoie ce résultat la en string
    // car je veux insérer une valeur dans un input type text
    return roundedResult.toString();

  }

  const kilos = unit === 'k' ? convert(weight, toKilos) : weight;
  const pounds = unit === 'l' ? convert(weight, toLbs) : weight;

  return (
    <div className="convertor">

    <Header/>
    <Input weight={kilos} unit='kilos' onWeightChange={handleKilosChange}/>
    <Input weight={pounds} unit='pounds' onWeightChange={handlePoundsChange}/>
    <Footer kilos={kilos}/>
  
    </div>
  )
}

export default App
