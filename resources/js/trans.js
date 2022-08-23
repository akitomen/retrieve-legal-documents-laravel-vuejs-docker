const TransMixin = {
    methods: {
        __(key) {
            let translation = key
                    .split(".")
                    .reduce(
                        (t, i) => t[i] || null,
                        window.translations[window.locale]);

            return translation;
        },
    }
};

export { TransMixin };
