document.getElementById("formCadastro").addEventListener("submit", async function(e){
    e.preventDefault();

    const formData = new FormData(this);

    try {
        //http://localhost:8000/AulaPHPDev33/webapi-php/
        const res = await fetch("cadastrar-dados-pessoais.php", {
            method: "POST",
            body: formData
        });

        // const data = await res.json();

        // console.log(data);
    } catch (error) {
        console.error(error);
        
    }
})