export default class Validation {
    constructor() {

        this.messages = {};
    }

    getMessages(field) {

        if (this.messages[field]) {
            return this.messages[field][0];
        }
    }

    setMessages(messages) {

        this.messages = messages;
    }

    empty() {


    }
}