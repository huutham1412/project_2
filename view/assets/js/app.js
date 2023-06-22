const iprice = document.querySelectorAll('.iprice')
const iquantity = document.querySelectorAll('.iquantity')
const itotal = document.querySelectorAll('.itotal')
const gtotal = document.querySelector('.gtotal')
let gt = 0



function subTotal() {
    gt = 0
    for (let i = 0; i < iprice.length; i++) {
        itotal[i].innerHTML = iquantity[i].value * iprice[i].value

        gt += iquantity[i].value * iprice[i].value
    }

    gtotal.innerHTML = gt
}
subTotal()

// iquantity.onchange = function () {
//     // this.form.submit();
//     subTotal()
// }