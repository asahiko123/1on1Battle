function makeHTMLComponentsByJs(obj){

    if(obj !== null){

        obj.forEach((element) => {
            console.log(element['name']);

            let ul = document.querySelector('ul.recommend');
            let li = document.createElement('li');
            let maker = document.createElement('p');
            let link = document.createElement('a');

            li.textContent = element['name'];
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



export{makeHTMLComponentsByJs};