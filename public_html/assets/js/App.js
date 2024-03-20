class App {
    constructor() {
        this.init();
    }

    async init() {
        let forms = document.querySelectorAll("form");
        forms.forEach(form => {
            form.addEventListener("submit", async function (event) {
                event.preventDefault();
                const res = await app.getJson(`${form.action}?q=${form.q.value}`);
                this.items = await res;
                this.renderItems();
            });
        });
    }

    async renderItems() {
        let div = document.createElement("div");
        this.items.forEach(item => {
            const template = document.querySelector('#item');
            const article = template.content.cloneNode(true);

            article.querySelector(".header").innerText = item["item_name"];
            article.querySelector(".text").innerText = item["item_price"];
            div.append(article);
        });
        document.body.append(div);
    }
    async getJson(url) {
        const response = await fetch(url);
        return await response.json();
    }

}