# Money Maze — Arena Sync Workflow

A simple two-branch flow so the agent's changes flow into `main` and your `main` changes flow back to the agent.

## The two branches

| Branch | Owner | Purpose |
|---|---|---|
| `main` | You | Production. You pull the agent's work into it and push your own changes from it. |
| `arena/019feb5d-money-maze` | Agent | The agent's working branch (the "arena" branch). All agent commits and pushes go here. |

The agent cannot create or push to other branches — `arena/019feb5d-money-maze` is its fixed home.

## The flow

```
  AGENT (arena branch)                    YOU (main)
  ─────────────────────                   ──────────
  edit → commit → push
                                          git pull origin arena/019feb5d-money-maze
                                          (merge into your local main)
                                          git push origin main   (if you want it on GitHub)

  git fetch origin
  git merge origin/main        ←─────────  you change main, push
  continue working
```

## A) Pull the agent's latest changes into main (in Antigravity's terminal)

```bash
git fetch origin
git checkout main
git pull origin main                          # get latest main from GitHub
git pull origin arena/019feb5d-money-maze     # merge the agent's latest work into main
git push origin main                          # optional: update main on GitHub
```

Prefer a reviewable merge? Replace the last `git pull` with:

```bash
git merge origin/arena/019feb5d-money-maze
```

## B) Push your own main changes so the agent can sync them

```bash
git push origin main
```

Then tell the agent "data synced" (or just ask it to check). The agent will `fetch` and `merge origin/main` into its branch and keep working on top of your latest changes.

## C) Conflicts

- **In step A** (pulling agent work into main): if git reports conflicts, stop and tell the agent — it will resolve them on its branch and re-push.
- **In step B** (agent merging your main): the agent resolves conflicts on its side. You never need to resolve them.

## Rules

- The agent never pushes to `main` directly (unless you explicitly ask).
- You never push to `arena/019feb5d-money-maze` directly (unless you want to).
- Pull requests are optional. With this flow, PR #1 can be closed/ignored — or used later as a review gate before merging.
