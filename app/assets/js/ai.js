// AI Tools JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const recipeForm = document.getElementById('recipe-form');
    const scanForm = document.getElementById('scan-form');
    
    if (recipeForm) {
        recipeForm.addEventListener('submit', handleRecipeGeneration);
    }
    
    if (scanForm) {
        scanForm.addEventListener('submit', handleFoodScan);
    }
});

async function handleRecipeGeneration(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const restrictions = formData.get('restrictions');
    const time = formData.get('time');
    
    try {
        const response = await API.post('/api/recipe/generate', {
            restrictions,
            time: parseInt(time)
        });
        
        if (response.success) {
            displayRecipeResult(response.recipe);
            showNotification('Рецепт успешно сгенерирован!', 'success');
        } else {
            showNotification('Ошибка при генерации рецепта', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Ошибка сервера', 'error');
    }
}

async function handleFoodScan(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    
    try {
        const response = await fetch('/api/food/scan', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            displayScanResult(data.data);
            showNotification('Блюдо успешно отсканировано!', 'success');
        } else {
            showNotification('Ошибка при сканировании', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Ошибка сервера', 'error');
    }
}

function displayRecipeResult(recipe) {
    const resultDiv = document.getElementById('recipe-result');
    resultDiv.innerHTML = `
        <div class="result-card" style="margin-top: 2rem; padding: 1.5rem; background: #f0f0f0; border-radius: 8px;">
            <h4>${recipe.title || 'Сгенерированный рецепт'}</h4>
            <p>${recipe.text || recipe.description || 'Рецепт готов!'}</p>
        </div>
    `;
}

function displayScanResult(data) {
    const resultDiv = document.getElementById('scan-result');
    const ingredients = data.ingredients || [];
    
    resultDiv.innerHTML = `
        <div class="result-card" style="margin-top: 2rem; padding: 1.5rem; background: #f0f0f0; border-radius: 8px;">
            <h4>Результаты сканирования</h4>
            <p><strong>Калории:</strong> ${data.calories || 0} ккал</p>
            <p><strong>Белки:</strong> ${data.protein || 0}г | <strong>Жиры:</strong> ${data.fats || 0}г | <strong>Углеводы:</strong> ${data.carbs || 0}г</p>
            <p><strong>Ингредиенты:</strong> ${ingredients.join(', ') || 'Не распознаны'}</p>
        </div>
    `;
}
