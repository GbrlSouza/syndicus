# Deploy automático (GitHub Actions → InfinityFree)

O link [filemanager.ai](https://filemanager.ai/new3/index.php?home=%2Fhtdocs) é o **gerenciador web** dos arquivos em `/htdocs`. Ele **não possui API** para upload automático.

O workflow `.github/workflows/deploy.yml` faz a mesma coisa via **FTP** (permitido pela InfinityFree): envia os arquivos para `/htdocs` a cada push na branch `main`.

## O que o workflow faz

1. Incrementa o patch em `VERSION` (ex.: `1.0.0` → `1.0.1`)
2. Faz upload do projeto para `/htdocs/` no servidor
3. Grava o novo número de versão no GitHub (`[skip ci]` evita loop infinito)

A versão exibida no site vem do arquivo `VERSION` (lido em `app/settings.php`).

## Configurar secrets no GitHub

Repositório → **Settings** → **Secrets and variables** → **Actions** → **New repository secret**

Crie **um secret por linha** (valores do painel FTP da conta `if0_42073908`):

| Nome do secret | Valor |
|----------------|--------|
| `FTP_HOST` | `ftpupload.net` |
| `FTP_USERNAME` | `if0_42073908` |
| `FTP_PASSWORD` | sua senha FTP (só no GitHub, nunca no código) |
| `FTP_PORT` | `21` (opcional; o workflow usa `21` se omitir) |

**Importante:** não commite senhas no Git. Use apenas os Secrets do GitHub.

Se a senha vazou em chat, e-mail ou print, altere-a no painel InfinityFree e atualize o secret `FTP_PASSWORD`.

## Disparar deploy

- **Automático:** `git push` na branch `main`
- **Manual:** Actions → Deploy Syndicus → Run workflow

## Estrutura no servidor

Após o deploy, `/htdocs` deve conter:

```
/htdocs/
  .htaccess
  app/
  public/
  VERSION
```

## Observações

- Alterações feitas só pelo filemanager **não** voltam para o GitHub; prefira editar localmente e dar push.
- Banco de dados: importe `app/DataBase/Schemma.sql` pelo phpMyAdmin da hospedagem quando necessário.
- Em produção, `APP_ENV` detecta automaticamente que não é `localhost` e usa as credenciais MySQL da InfinityFree em `app/settings.php`.
