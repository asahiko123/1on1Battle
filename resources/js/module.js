function makeHTMLComponentsByJs(obj){

    if(obj !== null){

        obj.forEach((element) => {
            console.log(element['name']);

            let ul = document.querySelector('ul.recommend');
            let li = document.createElement('li');
            let maker = document.createElement('p');
            let link = document.createElement('a');
            let img = document.createElement('img');

            li.textContent = element['name'];
            maker.textContent = element['maker'];
            link.href = element['url'];
            link.textContent = '->amazon';
            img.src = getLandingImage(element['url']);

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

function getLandingImage(url){

    fetch('api/scraping',{

        method:"POST",
        url:"api/scraping",
        body: JSON.stringify({
            url: url
        }),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
          },

    })
    .then((response) => {
        var getResultImage = async function(){

            const result = await new Promise((resolve,reject) => {
                const res = response.text();
                resolve(res);
            });

            const imageList = JSON.parse(result);

            return imageList;
        }

        getResultImage();
    })

}



export{makeHTMLComponentsByJs,getLandingImage};