// for home page category
let categoriesAll = Array.from(document.querySelectorAll('#dropdownCategories>li>a'))
let categoriesArr = [];
for (let li of categoriesAll) {
    categoriesArr.push(li.id);
	li.addEventListener('click', displayCategory);
}

function displayCategory() {
    console.log(this.id);
}
