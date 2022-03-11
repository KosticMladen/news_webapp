// for home page category
let categoriesAll = Array.from(document.querySelectorAll('#dropdownCategories>li>a'))
let categoriesArr = [];
for (let li of categoriesAll) {
    categoriesArr.push(li.id);
	li.addEventListener('click', displayCategory);
}


function displayCategory() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '?category=' + this.id);
    xhr.onload = () => {
        if (xhr.status == 200) {
            let content = this.response
            console.log(content);
        }
    }
    xhr.send();
}
