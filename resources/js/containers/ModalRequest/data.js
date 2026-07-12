// export const yesterday = new Date(Date.now() - 864e5).toISOString().slice(0, 10);
export const now = new Date(Date.now()).toISOString().slice(0, 10);

export const smsLogin = (phoneNumber, countryCode = process.env.MIX_ACCOUNT_KIT_COUNTRY_CODE) => {
    return new Promise((resolve, reject) => {
        AccountKit.login('PHONE', { countryCode, phoneNumber }, (response) => {
            if (response.status === "PARTIALLY_AUTHENTICATED") {
                resolve(response);
            }
            else if (response.status === "NOT_AUTHENTICATED" || response.status === "BAD_PARAMS") {
                reject(response.status, response);
            }
        });
    });
}

export const validate = (form, step) => {
    switch (step) {
        case 1:
            if (!empty(form.name) && (!empty(form.email) && email(form.email)) && !empty(form.phone)) {
                return false;
            }
            break;
        case 2:
            if ((!empty(form.date) && form.date < now) && !empty(form.time)) {
                return false;
            }
            break;
        default:
            if (form.state) {
                return false;
            } 
            break;
    }

    return true;
}

function empty(field) {
    return (field == null || field == '')
}

function email(email) {
    return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
