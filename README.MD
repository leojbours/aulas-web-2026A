
# Como Trabalhar com Git

## Preparar Alterações (Staging)

Use o comando `git add` para preparar arquivos para commit:

```bash
# Adicionar um arquivo específico
git add nome-do-arquivo.txt

# Adicionar todos os arquivos modificados
git add .

# Adicionar arquivos de uma pasta específica
git add pasta/
```

## Fazer Commit

Confirme suas alterações com `git commit`:

```bash
# Commit com mensagem
git commit -m "Descrição das alterações"

# Commit de todos os arquivos rastreados
git commit -a -m "Descrição das alterações"
```

## Enviar para Repositório Remoto

Envie seus commits para o repositório remoto com `git push`:

```bash
# Push para a branch atual
git push
```

## Fluxo Completo

```bash
git add .
git commit -m "Mensagem descritiva"
git push
```
