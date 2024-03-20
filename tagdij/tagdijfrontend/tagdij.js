document.addEventListener('DOMContentLoaded', function() {
    const insertButton = document.getElementById('create');
    const readButton = document.getElementById('read');
    const updateButton = document.getElementById('update');
    const deleteButton = document.getElementById('delete');
    const dolgozoForm = document.getElementById('dolgozoForm');
    const dolgozokDiv = document.getElementById('ugyfellista');

    insertButton.addEventListener('click',  async function(){
        let baseUrl="http://localhost/tagdij/tagdijbackend/index.php?ugyfel";   
        const formData = new FormData(document.getElementById("dolgozolForm"));
        let options = {
            method: 'POST',
            mode:"cors",
            body: formData
        };
       let response =  await fetch(baseUrl, options);
    });

    readButton.addEventListener('click', async function(){
        dolgozoForm.classList.add("d-none")
        dolgozoDiv.classList.remove("d-none")

        let baseUrl="http://localhost/tagdij/tagdijbackend/index.php?ugyfel";   
        let options = {
            method: 'GET',
            mode:"cors"
        };
       let response =  await fetch(baseUrl, options);
       if(response.ok){
            let data = await response.json();
            dolgozokListazas(data);
       }else{
        console.error("Hiba a szerver válaszába")
       }
    
    });
    function dolgozokListazas(dolgozok){
        let dolgozokDiv = document.getElementById("ugyfellista")
        tablazat = dolgozoFejlec();
        for (let dolgozo of dolgozok){
            tablazat += dolgozoSor(dolgozo);
        }
        dolgozokDiv.innerHTML = tablazat + '</tbody></table>';
    }
    function dolgozoSor(dolgozo){
        let sor =` 
        <tr>
            <td>${dolgozo.azon}</td>
            <td>${dolgozo.nev}</td>
            <td>${dolgozo.szuldatum}</td>
            <td>${dolgozo.irszam}</td>
            <td>${dolgozo.orsz}</td>
            <td>
                <button type="button" class="btn btn-success" id="select" onclick="adatBetoltes(${dolgozo.azon})"> Kiválaszt</button>
                <button type="button" class="btn btn-primary" id="update" onclick="adatBetoltes(${dolgozo.azon})"> Frissítés</button>
                <button type="button" class="btn btn-danger"  id="delete" onclick="adatBetoltes(${dolgozo.azon})"> Törlés   </button>
            </td>
        </tr>`
        return sor;
    }

    function dolgozoFejlec(){
        let fejlec= `
        <table class="table table-striped m-5 p-5 rounded-4 border border-dark">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>Születési Év</th>
                    <th>irányítószám</th>
                    <th>Ország</th>
                    <th>Művelet</th>
                </tr>
            </thead>
            <tbody>`;
        return fejlec;
    }
           
});
