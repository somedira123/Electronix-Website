var label = document.querySelector('label');
const mycard = document.querySelector('.mycard');

class item
{
    constructor(itemName)
    {
        this.CreateDiv(itemName);
    }
    CreateDiv(itemName)
    {
        let label = document.createElement('label');
        label.value = itemName;
        label.classList.add('name');

        let itemBox = document.createElement('div');
        itemBox.classList.add('item');

        let change = document.createElement('button');
        change.innerHTML = "CHANGE";
        change.classList.add('change');

        mycard.appendChild(itemBox);

        itemBox.appendChild(change);

        change.addEventListener(()=>this.edit(label));
    }
    edit(label)
    {
        label.disabled = !InputEvent.disabled;
    }
}
