export const menuLinks = [
    { 
        href: "#dashboard", 
        label: "Página Inicial", 
        icone: "ri-home-5-line" 

    },
    { 
        href: "#usuarios", 
        label: "Clientes", 
        icone: "ri-team-line" ,
        subMenu:[
            { href: "#usuarios_cadastrados", label: "Visão Geral" },
            { href: "#usuarios_inativos", label: "Cadastrar" }
        ]

    },
    { 
        href: "#conta", 
        label: "Conta", 
        icone: "ri-shield-user-line" ,
        subMenu:[
            { href: "#usuarios_cadastrados", label: "Visão Geral" },
            { href: "#usuarios_inativos", label: "Configurar" }
        ]

    },
    { 
        href: "#produtos", 
        label: "Produtos", 
        icone: "ri-window-line" ,
        subMenu:[
            { href: "#usuarios_cadastrados", label: "Visão Geral" },
            { href: "#usuarios_inativos", label: "Produtos" }
        ]

    },
    { 
        href: "#servicos", 
        label: "Serviços", 
        icone: "ri-store-line" ,
        subMenu:[
            { href: "#usuarios_cadastrados", label: "Visão Geral" },
            { href: "#usuarios_inativos", label: "Serviços" }
        ]

    },
    { 
        href: "#prestar_servico", 
        label: "Prestar Serviços", 
        icone: "ri-briefcase-2-line"  ,
        subMenu:[
            { href: "#usuarios_cadastrados", label: "Visão Geral" },
            { href: "#usuarios_inativos", label: "Prestar Serviços" }
        ]

    },
    { 
        href: "#dashboard", 
        label: "Estoque", 
        icone: "ri-archive-line"  ,
        subMenu:[
            { href: "#usuarios_cadastrados", label: "Visão Geral" },
            { href: "#usuarios_inativos", label: "Estoque" }
        ]

    },
    { 
        href: "#dashboard", 
        label: "Relatórios", 
        icone: "ri-line-chart-line" 

    }
    
];
