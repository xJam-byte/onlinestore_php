class App {
    constructor() {
        this.init();
    }

    async init() {
        let forms = document.querySelectorAll("form");
        forms.forEach(form => {
            form.addEventListener("submit", async function (e) {
                e.preventDefault();
                const res = await app.getJson(`${form.action}?q=${form.q.value}`);
                console.log(res);
            });
        });
    }

    async getJson(url) {
        const response = await fetch(url);
        return await response.json();
    }

}