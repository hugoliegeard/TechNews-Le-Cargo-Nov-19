var classes = [
    {
        "name": "App\\Article\\ArticleFactory",
        "interface": false,
        "methods": [
            {
                "name": "createFromArticleRequest",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "App\\Entity\\Article",
            "App\\Article\\ArticleRequest",
            "App\\Entity\\Article"
        ],
        "parents": [],
        "lcom": 1,
        "length": 12,
        "vocabulary": 2,
        "volume": 12,
        "difficulty": 5.5,
        "effort": 66,
        "level": 0.18,
        "bugs": 0,
        "time": 4,
        "intelligentContent": 2.18,
        "number_operators": 1,
        "number_operands": 11,
        "number_operators_unique": 1,
        "number_operands_unique": 1,
        "cloc": 6,
        "loc": 14,
        "lloc": 8,
        "mi": 115.06,
        "mIwoC": 72.61,
        "commentWeight": 42.45,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.18,
        "relativeSystemComplexity": 100.18,
        "totalStructuralComplexity": 100,
        "totalDataComplexity": 0.18,
        "totalSystemComplexity": 100.18,
        "pageRank": 0.06,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Article\\ArticleRequest",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTitre",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTitre",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSlug",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSlug",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContenu",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setContenu",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFeaturedImage",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFeaturedImage",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getImageUrl",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setImageUrl",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSpecial",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSpecial",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSpotlight",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSpotlight",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCategorie",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCategorie",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMembre",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMembre",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateCreation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateCreation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 23,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 9,
        "nbMethodsSetters": 9,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "App\\Entity\\Membre",
            "DateTime",
            "App\\Entity\\Membre",
            "App\\Entity\\Membre",
            "DateTime",
            "DateTime"
        ],
        "parents": [],
        "lcom": 1,
        "length": 72,
        "vocabulary": 14,
        "volume": 274.13,
        "difficulty": 4,
        "effort": 1096.52,
        "level": 0.25,
        "bugs": 0.09,
        "time": 61,
        "intelligentContent": 68.53,
        "number_operators": 24,
        "number_operands": 48,
        "number_operators_unique": 2,
        "number_operands_unique": 12,
        "cloc": 89,
        "loc": 197,
        "lloc": 108,
        "mi": 81.59,
        "mIwoC": 38.44,
        "commentWeight": 43.15,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 11.52,
        "relativeSystemComplexity": 11.52,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 265,
        "totalSystemComplexity": 265,
        "pageRank": 0.13,
        "afferentCoupling": 3,
        "efferentCoupling": 2,
        "instability": 0.4,
        "violations": {}
    },
    {
        "name": "App\\Article\\ArticleRequestHandler",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "handle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Article\\ArticleFactory",
            "App\\Article\\ArticleRequest"
        ],
        "parents": [],
        "lcom": 1,
        "length": 42,
        "vocabulary": 13,
        "volume": 155.42,
        "difficulty": 7.11,
        "effort": 1105.2,
        "level": 0.14,
        "bugs": 0.05,
        "time": 61,
        "intelligentContent": 21.86,
        "number_operators": 10,
        "number_operands": 32,
        "number_operators_unique": 4,
        "number_operands_unique": 9,
        "cloc": 14,
        "loc": 41,
        "lloc": 27,
        "mi": 92.63,
        "mIwoC": 53.3,
        "commentWeight": 39.33,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.27,
        "relativeSystemComplexity": 100.27,
        "totalStructuralComplexity": 200,
        "totalDataComplexity": 0.55,
        "totalSystemComplexity": 200.55,
        "pageRank": 0.04,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "App\\Article\\ArticleType",
        "interface": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "lcom": 2,
        "length": 53,
        "vocabulary": 33,
        "volume": 267.35,
        "difficulty": 0,
        "effort": 0,
        "level": 1.25,
        "bugs": 0.09,
        "time": 0,
        "intelligentContent": 332.93,
        "number_operators": 0,
        "number_operands": 53,
        "number_operators_unique": 0,
        "number_operands_unique": 33,
        "cloc": 8,
        "loc": 22,
        "lloc": 14,
        "mi": 98.08,
        "mIwoC": 57.87,
        "commentWeight": 40.21,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 4.5,
        "totalStructuralComplexity": 8,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 9,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Article\\Provider\\YamlProvider",
        "interface": false,
        "methods": [
            {
                "name": "getArticles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Yaml\\Yaml"
        ],
        "parents": [],
        "lcom": 1,
        "length": 8,
        "vocabulary": 8,
        "volume": 24,
        "difficulty": 1.5,
        "effort": 36,
        "level": 0.67,
        "bugs": 0.01,
        "time": 2,
        "intelligentContent": 16,
        "number_operators": 3,
        "number_operands": 5,
        "number_operators_unique": 3,
        "number_operands_unique": 5,
        "cloc": 4,
        "loc": 16,
        "lloc": 12,
        "mi": 101.63,
        "mIwoC": 66.66,
        "commentWeight": 34.97,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 4.33,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 0.33,
        "totalSystemComplexity": 4.33,
        "pageRank": 0.04,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "App\\Controller\\HelperTrait",
        "interface": false,
        "methods": [
            {
                "name": "slugify",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Behat\\Transliterator\\Transliterator"
        ],
        "parents": [],
        "lcom": 1,
        "length": 3,
        "vocabulary": 2,
        "volume": 3,
        "difficulty": 1,
        "effort": 3,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 3,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 1,
        "cloc": 6,
        "loc": 14,
        "lloc": 8,
        "mi": 119.28,
        "mIwoC": 76.82,
        "commentWeight": 42.45,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\TechNews\\ArticleController",
        "interface": false,
        "methods": [
            {
                "name": "test",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "newArticle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "App\\Entity\\Categorie",
            "App\\Entity\\Membre",
            "App\\Entity\\Article",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Article\\ArticleRequestHandler",
            "App\\Article\\ArticleRequest",
            "Symfony\\Component\\Routing\\Annotation\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "lcom": 1,
        "length": 97,
        "vocabulary": 35,
        "volume": 497.54,
        "difficulty": 6.58,
        "effort": 3275.47,
        "level": 0.15,
        "bugs": 0.17,
        "time": 182,
        "intelligentContent": 75.58,
        "number_operators": 18,
        "number_operands": 79,
        "number_operators_unique": 5,
        "number_operands_unique": 30,
        "cloc": 40,
        "loc": 85,
        "lloc": 45,
        "mi": 88.47,
        "mIwoC": 44.78,
        "commentWeight": 43.68,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 1089,
        "relativeDataComplexity": 0.12,
        "relativeSystemComplexity": 1089.12,
        "totalStructuralComplexity": 2178,
        "totalDataComplexity": 0.24,
        "totalSystemComplexity": 2178.24,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 9,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\TechNews\\IndexController",
        "interface": false,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "categorie",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "article",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "sidebar",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "App\\Article\\Provider\\YamlProvider",
            "App\\Entity\\Categorie",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "App\\Entity\\Article",
            "Symfony\\Component\\Routing\\Annotation\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "lcom": 1,
        "length": 71,
        "vocabulary": 20,
        "volume": 306.86,
        "difficulty": 6.63,
        "effort": 2032.93,
        "level": 0.15,
        "bugs": 0.1,
        "time": 113,
        "intelligentContent": 46.32,
        "number_operators": 18,
        "number_operands": 53,
        "number_operators_unique": 4,
        "number_operands_unique": 16,
        "cloc": 67,
        "loc": 101,
        "lloc": 34,
        "mi": 96.41,
        "mIwoC": 48.78,
        "commentWeight": 47.63,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 144,
        "relativeDataComplexity": 0.56,
        "relativeSystemComplexity": 144.56,
        "totalStructuralComplexity": 576,
        "totalDataComplexity": 2.23,
        "totalSystemComplexity": 578.23,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Article",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTitre",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTitre",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSlug",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSlug",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContenu",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setContenu",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFeaturedImage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFeaturedImage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSpecial",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSpecial",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSpotlight",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSpotlight",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateCreation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateCreation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCategorie",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCategorie",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMembre",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMembre",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 20,
        "nbMethods": 16,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 16,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "DateTimeInterface"
        ],
        "parents": [],
        "lcom": 1,
        "length": 110,
        "vocabulary": 13,
        "volume": 407.05,
        "difficulty": 6.73,
        "effort": 2738.33,
        "level": 0.15,
        "bugs": 0.14,
        "time": 152,
        "intelligentContent": 60.51,
        "number_operators": 36,
        "number_operands": 74,
        "number_operators_unique": 2,
        "number_operands_unique": 11,
        "cloc": 64,
        "loc": 174,
        "lloc": 110,
        "mi": 77.43,
        "mIwoC": 37.06,
        "commentWeight": 40.36,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 17.95,
        "relativeSystemComplexity": 17.95,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 359,
        "totalSystemComplexity": 359,
        "pageRank": 0.17,
        "afferentCoupling": 3,
        "efferentCoupling": 1,
        "instability": 0.25,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Categorie",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSlug",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSlug",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getArticles",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setArticles",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 6,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 6,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection"
        ],
        "parents": [],
        "lcom": 1,
        "length": 26,
        "vocabulary": 6,
        "volume": 67.21,
        "difficulty": 4,
        "effort": 268.84,
        "level": 0.25,
        "bugs": 0.02,
        "time": 15,
        "intelligentContent": 16.8,
        "number_operators": 10,
        "number_operands": 16,
        "number_operators_unique": 2,
        "number_operands_unique": 4,
        "cloc": 27,
        "loc": 69,
        "lloc": 42,
        "mi": 92.88,
        "mIwoC": 51.66,
        "commentWeight": 41.22,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 6.38,
        "relativeSystemComplexity": 6.38,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 51,
        "totalSystemComplexity": 51,
        "pageRank": 0.05,
        "afferentCoupling": 2,
        "efferentCoupling": 1,
        "instability": 0.33,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Membre",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPrenom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPrenom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPassword",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPassword",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateInscription",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateInscription",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDerniereConnexion",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDerniereConnexion",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRoles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRoles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getArticles",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setArticles",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 18,
        "nbMethods": 16,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 16,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "DateTime",
            "DateTimeInterface",
            "DateTimeInterface"
        ],
        "parents": [],
        "lcom": 1,
        "length": 68,
        "vocabulary": 11,
        "volume": 235.24,
        "difficulty": 4.67,
        "effort": 1097.79,
        "level": 0.21,
        "bugs": 0.08,
        "time": 61,
        "intelligentContent": 50.41,
        "number_operators": 26,
        "number_operands": 42,
        "number_operators_unique": 2,
        "number_operands_unique": 9,
        "cloc": 42,
        "loc": 135,
        "lloc": 93,
        "mi": 78.35,
        "mIwoC": 40.32,
        "commentWeight": 38.03,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 16.44,
        "relativeSystemComplexity": 16.44,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 296,
        "totalSystemComplexity": 296,
        "pageRank": 0.22,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "App\\Kernel",
        "interface": false,
        "methods": [
            {
                "name": "getCacheDir",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLogDir",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "registerBundles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureContainer",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureRoutes",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Component\\HttpKernel\\Kernel",
            "class",
            "Symfony\\Component\\DependencyInjection\\ContainerBuilder",
            "Symfony\\Component\\Config\\Loader\\LoaderInterface",
            "Symfony\\Component\\Config\\Resource\\FileResource",
            "Symfony\\Component\\Routing\\RouteCollectionBuilder"
        ],
        "parents": [
            "Symfony\\Component\\HttpKernel\\Kernel"
        ],
        "lcom": 1,
        "length": 102,
        "vocabulary": 31,
        "volume": 505.33,
        "difficulty": 6.63,
        "effort": 3352.66,
        "level": 0.15,
        "bugs": 0.17,
        "time": 186,
        "intelligentContent": 76.17,
        "number_operators": 33,
        "number_operands": 69,
        "number_operators_unique": 5,
        "number_operands_unique": 26,
        "cloc": 6,
        "loc": 43,
        "lloc": 39,
        "mi": 73.31,
        "mIwoC": 45.96,
        "commentWeight": 27.35,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 0.43,
        "relativeSystemComplexity": 25.43,
        "totalStructuralComplexity": 125,
        "totalDataComplexity": 2.17,
        "totalSystemComplexity": 127.17,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "DoctrineMigrations\\Version20181108101057",
        "interface": false,
        "methods": [
            {
                "name": "up",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "down",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Migrations\\AbstractMigration",
            "Doctrine\\DBAL\\Schema\\Schema",
            "Doctrine\\DBAL\\Schema\\Schema"
        ],
        "parents": [
            "Doctrine\\Migrations\\AbstractMigration"
        ],
        "lcom": 1,
        "length": 32,
        "vocabulary": 15,
        "volume": 125.02,
        "difficulty": 1.07,
        "effort": 133.95,
        "level": 0.93,
        "bugs": 0.04,
        "time": 7,
        "intelligentContent": 116.69,
        "number_operators": 2,
        "number_operands": 30,
        "number_operators_unique": 1,
        "number_operands_unique": 14,
        "cloc": 5,
        "loc": 27,
        "lloc": 22,
        "mi": 86.82,
        "mIwoC": 55.9,
        "commentWeight": 30.92,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.2,
        "relativeSystemComplexity": 16.2,
        "totalStructuralComplexity": 32,
        "totalDataComplexity": 0.4,
        "totalSystemComplexity": 32.4,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Repository\\ArticleRepository",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findLatestArticles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findArticlesSuggestions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findSpotlightArticles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findSpecialArticles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Symfony\\Bridge\\Doctrine\\RegistryInterface",
            "parent"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "lcom": 2,
        "length": 36,
        "vocabulary": 17,
        "volume": 147.15,
        "difficulty": 1,
        "effort": 147.15,
        "level": 1,
        "bugs": 0.05,
        "time": 8,
        "intelligentContent": 147.15,
        "number_operators": 4,
        "number_operands": 32,
        "number_operators_unique": 1,
        "number_operands_unique": 16,
        "cloc": 17,
        "loc": 43,
        "lloc": 26,
        "mi": 95.18,
        "mIwoC": 53.82,
        "commentWeight": 41.36,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.46,
        "relativeSystemComplexity": 81.46,
        "totalStructuralComplexity": 405,
        "totalDataComplexity": 2.3,
        "totalSystemComplexity": 407.3,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Repository\\CategorieRepository",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findCategoriesHavingArticles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Symfony\\Bridge\\Doctrine\\RegistryInterface",
            "parent"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "lcom": 2,
        "length": 8,
        "vocabulary": 6,
        "volume": 20.68,
        "difficulty": 0.7,
        "effort": 14.48,
        "level": 1.43,
        "bugs": 0.01,
        "time": 1,
        "intelligentContent": 29.54,
        "number_operators": 1,
        "number_operands": 7,
        "number_operators_unique": 1,
        "number_operands_unique": 5,
        "cloc": 10,
        "loc": 22,
        "lloc": 12,
        "mi": 110.35,
        "mIwoC": 67.11,
        "commentWeight": 43.23,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.21,
        "relativeSystemComplexity": 36.21,
        "totalStructuralComplexity": 72,
        "totalDataComplexity": 0.43,
        "totalSystemComplexity": 72.43,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Repository\\MembreRepository",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Symfony\\Bridge\\Doctrine\\RegistryInterface",
            "parent"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 6,
        "loc": 14,
        "lloc": 8,
        "mi": 213.45,
        "mIwoC": 171,
        "commentWeight": 42.45,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Service\\Twig\\AppExtension",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFunctions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFilters",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Twig\\Extension\\AbstractExtension",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Twig_Function",
            "Twig_Filter"
        ],
        "parents": [
            "Twig\\Extension\\AbstractExtension"
        ],
        "lcom": 2,
        "length": 34,
        "vocabulary": 18,
        "volume": 141.78,
        "difficulty": 4.42,
        "effort": 627.09,
        "level": 0.23,
        "bugs": 0.05,
        "time": 35,
        "intelligentContent": 32.05,
        "number_operators": 11,
        "number_operands": 23,
        "number_operators_unique": 5,
        "number_operands_unique": 13,
        "cloc": 9,
        "loc": 36,
        "lloc": 27,
        "mi": 88.55,
        "mIwoC": 53.58,
        "commentWeight": 34.97,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 1.44,
        "relativeSystemComplexity": 5.44,
        "totalStructuralComplexity": 12,
        "totalDataComplexity": 4.33,
        "totalSystemComplexity": 16.33,
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    }
]