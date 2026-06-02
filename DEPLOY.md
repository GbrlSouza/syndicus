# Deploy automático — configurar FTP_PASSWORD

## Erro: “Senha FTP não disponível no runner”

O log mostra `FTP_PASSWORD:` **vazio** → o GitHub **não enviou** a senha ao workflow.

### Causa nº 1 (mais comum): criou em **Variables** em vez de **Secrets**

| Onde clicou | Funciona? |
|-------------|-----------|
| **Secrets** → Repository secrets → `FTP_PASSWORD` | Sim |
| **Variables** → Repository variables → `FTP_PASSWORD` | O workflow também aceita (menos seguro) |
| Environment / Dependabot / Codespaces | Não |

**Caminho correto:**

1. `https://github.com/gbrlsouza/syndicus/settings/secrets/actions`
2. Aba **Repository secrets** (não “Variables”)
3. **New repository secret**
4. Name: `FTP_PASSWORD` (copie e cole, sem espaço)
5. Value: senha FTP da InfinityFree
6. **Add secret**

### Causa nº 2: repositório errado

O secret precisa estar em **gbrlsouza/syndicus**, não em outro repo ou só no fork antigo.

### Causa nº 3: run manual sem senha

No **Run workflow**, o campo **Senha FTP** agora é **obrigatório**. Preencha antes de rodar.

---

## Testar agora (sem depender do secret)

1. **Actions** → **Deploy Syndicus** → **Run workflow**
2. Branch: `main`
3. **Senha FTP:** cole a senha da InfinityFree
4. **Run workflow**

Se o deploy passar, o FTP está ok — falta só o secret para o push automático.

---

## Push automático na `main`

Depois que o secret existir em **Repository secrets** com nome `FTP_PASSWORD`, cada `git push` na `main` faz deploy sozinho.

---

## Dados FTP (já no workflow)

| Campo | Valor |
|-------|--------|
| Host | `ftpupload.net` |
| Usuário | `if0_42073908` |
| Porta | `21` |
| Pasta | `/htdocs/` |
