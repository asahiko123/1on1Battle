function makeHTMLComponentsByJs(obj){

    if(obj !== null){

        obj.forEach((element) => {
            console.log(element['name']);

            let ul = document.querySelector('ul.recommend');
            let li = document.createElement('li');
            let maker = document.createElement('p');
            let link = document.createElement('a');

            li.textContent = element['name'];
            li.setAttribute('name',element['name']);
            maker.textContent = element['maker'];
            link.href = element['url'];
            link.textContent = '->amazon';

            ul.appendChild(li);
            li.appendChild(maker);
            li.appendChild(link);

        })

    }else{
        let li = document.createElement('li');
        li.textContent = '飴ちゃんは品切れだよ...';
        let ul = document.querySelector('ul.recommend');
        ul.appendChild(li);
    }
}

function getLandingImage(url,name){

    fetch('api/scraping',{

        method:"POST",
        url:"api/scraping",
        body: JSON.stringify({
            name: name,
            url: url
        }),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
          },

    })
    .then((response) => {

        return response.json();
    })
    .then(function(data){

        const candyName = Object.keys(data);

        console.log(candyName);
        
        let li = document.querySelectorAll('li');


        li.forEach(link => {

            let name = link.getAttribute('name');
            
            if(name === candyName[0]){

                let img = document.createElement('img');
                img.src = data[candyName[0]];
                link.appendChild(img);

            }

        })

    })

}



export{makeHTMLComponentsByJs,getLandingImage};