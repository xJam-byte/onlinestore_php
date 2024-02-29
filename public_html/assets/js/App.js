class App {
    constructor() {
        this.init();
    }

    async init() {
        let forms = document.querySelectorAll("form");
        forms.forEach(form => {
            form.addEventListener("submit", (e) => {
                e.preventDefault();
                switch (form.name) {
                    case "get-item":
                        console.log(form.title.value);
                        break;
                
                    default:
                        break;
                }
            });
        });
    }

    async getJson(url) {
        const response = await fetch(url);
        return await response.json();
    }

}