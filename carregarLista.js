async function carregarLista(){
    try {
        const response = await fetch("busca-usuario.php");
        
        const usuarios = await response.json();

        const container = document.getElementById("listaUsuarios");
        container.innerHTML = "";

        if(usuarios.length == 0){
            container.innerHTML = `<p>Nenhum usuário encontrado</p>`;
            return;
        }

        const ul = document.createElement("ul");
        ul.style.listStyle = "none";

        usuarios.forEach(usuario => {
            const li = document.createElement("li");
            li.innerHTML = `<p>${usuario.nome}</p>`;
            
            ul.appendChild(li);
        });

        container.appendChild(ul);
    } catch (error) {
        console.error(error);        
    }
}

window.addEventListener("DOMContentLoaded", carregarLista);