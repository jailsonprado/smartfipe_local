function pegamarca() {
    let marca = document.getElementById('marca');
    let modelo = document.getElementById('modelo');
    let modeloopcao = document.getElementById('model');
    marca = marca.value;


    if (marca == "lg") {
        modelo.disabled = false;
        modeloopcao.innerText = "One Macro"
        "moto one";

    } else {
        console.log("Outra marca");
        modelo.disabled = true;
    }

    if (marca == "apple") {
        modelo.disabled = false;
        modeloopcao.innerText = "iphone 7 plus";

    } else {
        console.log("Outra marca");
        modelo.disabled = true;
    }

    if (marca == "motorola") {
        modelo.disabled = false;
        modeloopcao.innerText = "Moto one vision";



    } else {
        console.log("Outra marca");
        modelo.disabled = true;
    }

    if (marca == "sansung") {
        modelo.disabled = false;
        modeloopcao.innerText = "galaxy a51";

    } else {
        console.log("Outra marca");
        modelo.disabled = true;
    }
} //fim function