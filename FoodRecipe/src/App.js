import React,{useEffect, useState } from "react";
import './App.css';
import Recipe from './Recipe';

const App = () => {
  const APP_ID = "741757c1";
  const APP_KEY = "d5b1d82b91cd909be10df995c3606e53	";

  const [recipes, setRecipes] = useState([]);
  const [search, setSearch] = useState("");
  const [query, setQuery] = useState('chicken');

useEffect(() => {
  getRecipes();
},[query]);

const getRecipes = async () => {
  const response = await fetch(`https://api.edamam.com/search?q=${query}&app_id=${APP_ID}&app_key=${APP_KEY}`);
  const data = await response.json();
  setRecipes(data.hits);
};

const updateSearch = e => {
  setSearch(e.target.value);

};

const getSearch = e =>  {
  e.preventDefault();
  setQuery(search);
  setSearch(" ");
}
return (
  <div className = "App">
    <form onSubmit={getSearch} className="search-form">
      <input classsName = "search-bar" type="text" value={search} onChange={updateSearch}/>
      <button className = "search-button" type = "submit">
        Search
      </button>
    </form>
    <div className="recipes">
    {recipes.map(recipe => (
      <Recipe 
      key={recipe.recipe.label}
      title={recipe.recipe.label} 
      calories={recipe.recipe.calories}
      image={recipe.recipe.image}
      ingredients={recipe.recipe.ingredients} />
    ))}
    </div>
  </div>
 );
}

export default App;
