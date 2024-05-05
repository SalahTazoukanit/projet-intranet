const filter = document.querySelector("#filter");
const containerVoyages = document.querySelector(".containerVoyages");


filter.addEventListener("input", async () =>{

        const filtered = document.querySelector("#filter").value;

        console.log(filtered);
        let response = await fetch("../controlers/filtersVerif.php?filter="+filtered);
        console.log(response);

        let data = await response.text();
        
        containerVoyages.innerHTML = data ;

})


const filterCat = document.querySelector("#filterCat");

filterCat.addEventListener("change", async ()=>{

        const filteredCat = document.querySelector("#filterCat").value ;
        console.log(filteredCat);

        let response = await fetch("../controlers/filtersVerif.php?filterCat="+filteredCat);
        console.log(response);

        let data = await response.text();
        console.log(data);

        containerVoyages.innerHTML = data ;

})


