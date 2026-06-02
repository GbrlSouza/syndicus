# Deploy automático (GitHub Actions → InfinityFree)

## Por que o secret “não era lido”

No GitHub Actions **não dá** para testar secrets assim: `[ -z "${{ secrets.FTP_PASSWORD }}" ]` no bash — o valor chega **vazio** de propósito.

O workflow agora:

1. Usa o **Environment** `syndicus-deploy` (forma mais confiável)
2. Valida a senha com `env: FTP_PASSWORD: ${{ secrets.FTP_PASSWORD }}`
3. Permite teste manual com senha no **Run workflow**

---

## Passo a passo (faça nesta ordem)

### 1. Criar o Environment

1. Abra: `https://github.com/gbrlsouza/syndicus/settings/environments`
2. **New environment** → nome exato: `syndicus-deploy`
3. **Configure environment** → em **Environment secrets** → **Add secret**
   - Name: `FTP_PASSWORD`
   - Value: sua senha FTP da InfinityFree
4. Salve (não precisa de “Required reviewers” para testar)

### 2. (Opcional) Secret no repositório

Se preferir, também pode criar em **Settings → Secrets and variables → Actions → Repository secrets**:

- Name: `FTP_PASSWORD`

O job usa o environment `syndicus-deploy`; o secret do environment tem prioridade.

### 3. Enviar o workflow atualizado

```bash
git add .github/workflows/deploy.yml DEPLOY.md
git commit -m "ci: corrigir leitura do FTP_PASSWORD"
git push origin main
```

### 4. Teste manual (se o secret ainda falhar)

1. **Actions** → **Deploy Syndicus** → **Run workflow**
2. Preencha **Senha FTP** com a senha da InfinityFree
3. **Run workflow**

Isso envia a senha direto no deploy, sem depender do secret.

---

## Dados FTP (já no workflow)

| Campo | Valor |
|-------|--------|
| Host | `ftpupload.net` |
| Usuário | `if0_42073908` |
| Porta | `21` |
| Pasta | `/htdocs/` |

---

## Erros comuns

| Problema | Solução |
|----------|---------|
| Secret em **Environment** errado | Nome do environment deve ser `syndicus-deploy` |
| Secret só em **Dependabot** / **Codespaces** | Use **Actions** ou **Environment** acima |
| Repositório é **fork** | Secrets ficam no **seu** fork, não no original |
| Nome errado | Exatamente `FTP_PASSWORD` (maiúsculas) |
| Workflow na branch errada | Secrets funcionam no push para `main` com o workflow em `main` |

---

## Segurança

Não commite senhas. Se a senha vazou, troque no painel InfinityFree e atualize o secret.
