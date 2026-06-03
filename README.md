<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=1D9E75&height=140&section=header&text=Syndicus&fontSize=52&fontColor=ffffff&fontAlignY=38&desc=Sistema+de+gerenciamento+de+condomínios&descAlignY=60&descSize=16&descColor=b2f0db" width="100%" />

<br/>

[![PHP](https://img.shields.io/badge/PHP-8.2+-7F77DD?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7+-378ADD?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat-square&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6-BA7517?style=flat-square&logo=javascript&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![License](https://img.shields.io/github/license/GbrlSouza/syndicus?style=flat-square&color=1D9E75)](./LICENSE)

[![Last Commit](https://img.shields.io/github/last-commit/GbrlSouza/syndicus?style=flat-square&color=555)](https://github.com/GbrlSouza/syndicus/commits/main)
[![Repo Size](https://img.shields.io/github/repo-size/GbrlSouza/syndicus?style=flat-square&color=555)](https://github.com/GbrlSouza/syndicus)
[![Issues](https://img.shields.io/github/issues/GbrlSouza/syndicus?style=flat-square&color=E24B4A)](https://github.com/GbrlSouza/syndicus/issues)
[![Top Language](https://img.shields.io/github/languages/top/GbrlSouza/syndicus?style=flat-square&color=7F77DD)](https://github.com/GbrlSouza/syndicus)

[![Version](https://img.shields.io/endpoint?url=https://raw.githubusercontent.com/GbrlSouza/syndicus/main/.github/badges/version.json&style=flat-square)](https://github.com/GbrlSouza/syndicus)

<br/>

<a href="https://github.com/GbrlSouza/syndicus"><img src="https://img.shields.io/badge/Ver%20Repositório-1D9E75?style=for-the-badge&logo=github&logoColor=white" /></a>
&nbsp;
<a href="https://github.com/GbrlSouza/syndicus/issues"><img src="https://img.shields.io/badge/Reportar%20Issue-E24B4A?style=for-the-badge&logo=github&logoColor=white" /></a>
&nbsp;
<a href="https://github.com/GbrlSouza/syndicus/fork"><img src="https://img.shields.io/badge/Fork-555555?style=for-the-badge&logo=github&logoColor=white" /></a>

</div>

<br/>

---

## Sobre

O **Syndicus** é um sistema web open source para gestão de condomínios, desenvolvido com PHP 8.2+, MySQL e Bootstrap 5. Focado em praticidade para síndicos e moradores.

<br/>

<table>
<tr>
<td width="50%">

**🏠 Gestão de Moradores**
Cadastro completo de unidades, moradores e proprietários com histórico de ocupação.

</td>
<td width="50%">

**💰 Controle Financeiro**
Geração de boletos, controle de inadimplência e relatórios financeiros detalhados.

</td>
</tr>
<tr>
<td width="50%">

**📅 Reservas**
Agendamento de áreas comuns com calendário integrado e controle de conflitos.

</td>
<td width="50%">

**📢 Comunicados**
Notificações internas, murais digitais e registro de ocorrências por unidade.

</td>
</tr>
</table>

<br/>

---

## Requisitos

| Tecnologia | Versão mínima |
|:-----------|:-------------|
| ![PHP](https://img.shields.io/badge/PHP-8.2+-7F77DD?style=flat-square&logo=php&logoColor=white) | 8.2 |
| ![MySQL](https://img.shields.io/badge/MySQL-378ADD?style=flat-square&logo=mysql&logoColor=white) | 5.7 |
| ![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=flat-square&logo=xampp&logoColor=white) | 8.2+ |
| ![Composer](https://img.shields.io/badge/Composer-885630?style=flat-square&logo=composer&logoColor=white) | 2.x |

<br/>

---

## Instalação

<details>
<summary><b>▶ Passo a passo</b></summary>

<br/>

**1. Clone o repositório**
```bash
git clone https://github.com/GbrlSouza/syndicus.git
cd syndicus
```

**2. Instale as dependências**
```bash
composer install
npm install
```

**3. Configure o ambiente**
```bash
cp .env.example .env
# Edite o .env com suas credenciais de banco de dados
```

**4. Execute as migrations**
```bash
php artisan migrate
```

**5. Inicie o servidor**
```bash
php artisan serve
```

Acesse `http://localhost:8000` no navegador.

</details>

<br/>

---

## Estrutura do Projeto

```
syndicus/
├── app/
│   ├── Controllers/
│   ├── Models/
│   └── Views/
├── config/
├── database/
│   └── migrations/
├── public/
├── resources/
│   ├── css/
│   └── js/
├── routes/
├── .env.example
└── composer.json
```

<br/>

---

## Contribuindo

Contribuições são bem-vindas! Siga os passos:

1. Faça um **fork** do projeto
2. Crie uma branch: `git checkout -b feature/minha-feature`
3. Commit suas mudanças: `git commit -m 'feat: minha feature'`
4. Push para a branch: `git push origin feature/minha-feature`
5. Abra um **Pull Request**

<br/>

---

<div align="center">

Feito com ♥ por <a href="https://github.com/GbrlSouza"><b>GbrlSouza</b></a>

[![MIT License](https://img.shields.io/badge/License-MIT-1D9E75?style=flat-square)](./LICENSE)

<img src="https://capsule-render.vercel.app/api?type=waving&color=1D9E75&height=80&section=footer" width="100%" />

</div>
