// import './stimulus_bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.scss';

// console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

const menu = document.querySelector('.menu')
const nav = document.querySelector('.links-menu')
let count = 0

//MENU BURGER

menu.addEventListener('click', function (menu){
    if (count == 0) {
        nav.classList.add('nav-menu')
        count = 1
        return
    } else if (count == 1) {
        nav.classList.remove('nav-menu')
        count = 0
        return
    }
})

//RECHERCHE D'INGREDIENT

//recuperation de l'input
const input = document.querySelector('#ingredient-search');
//zone d'affichage
const results = document.querySelector('#ingredient-results');
//zone des ingredient cliqué
const selected = document.querySelector('#selected-ingredients');

// si l'input existe
if (input) {

    // quand l'utilisateur écrit dans l'input
    input.addEventListener('input', async () => {

        //on recupere la valeur dans une constante et on supprime les espaces trim
        const query = input.value.trim();

        //si moins de 2 caractere, on arrete la fonction
        if (query.length < 2) {
            results.innerHTML = '';
            return;
        }

        //on envoie une requête à Symfony avec ce qu'on a écrit dans l'input (=${far})
        const response = await fetch(`/ingredient/search?q=${query}`);

        //on transforme la reponse json en tableau
        const ingredients = await response.json();

        //on vide les anciens resultats pour afficher les nouveaux
        results.innerHTML = '';

        //pour chaque ingredients trouvé
        ingredients.forEach(ingredient => {
            //on crée une div
            const div = document.createElement('div');
            //affiche le texte dans la div (farine)
            div.textContent = ingredient.nom;

            //quand on clique sur un ingrédient
            div.addEventListener('click', () => {

                //Crée une constante qui va compté le nombre d'ingredient
                const ingredientCount = selected.children.length;
                //si le bombre d'ingrédients est superieur à 20 un message d'alerte s'affiche et annule l'ajout
                if (ingredientCount >= 20) {
                    alert('Maximum 20 ingrédients');
                    return;
                }

                //on ajoute l'ingrédient dans la liste sélectionnée
                selected.insertAdjacentHTML('beforeend', `
                    <div class="recipe">
                        <input type="hidden" name="ingredients[]" value="${ingredient.id}">

                        <span>${ingredient.nom}: </span>
                        <div>
                            <input type="number" name="dosages[${ingredient.id}]" placeholder="Dosage"  min="1"  max="100000">

                            <span> ${ingredient.mesure}</span>

                            <button type="button" class="remove-ingredient btn">
                                X
                            </button>
                        </div>


                    </div>
                `);

                // récupération du dernier ingrédient ajouté
                const lastIngredient = selected.lastElementChild;


                // récupération du bouton supprimer
                const removeButton = lastIngredient.querySelector('.remove-ingredient');


                // suppression au clic
                removeButton.addEventListener('click', () => {

                    lastIngredient.remove();
                });

                //on vide l'input de recherche
                input.value = '';
                //on vide les résultats affichés
                results.innerHTML = '';
            });
            //on ajoute la div dans les résultats
            results.appendChild(div);
        });
    });
}