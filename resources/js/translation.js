module.exports = {
    methods: {
        __(key, replace) {
            var translations = _.merge(window.config.translations, window.config['tool-translations']);
            var translation = translations[key]
                ? translations[key]
                : key;

            _.forEach(replace, (value, key) => {
                translation = translation.replace(':' + key, value)
            });

            return translation;
        }
    }
};
