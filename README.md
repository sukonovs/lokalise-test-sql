
## Reqs
1) Docker, Docker compose, Git (for git clone)

## Installation
1) Clone/Download repo
2) run ``make build`` to build containers
2) run ``make setup`` to setup projects
3) run ``make test`` to test query
4) run ``make end `` to destroy task containers

## Notes
1) MySQL ignores CHECK() constraint up to 8.0.16 version (https://dev.mysql.com/doc/refman/8.0/en/create-table-check-constraints.html), so I implemented some checks on PHP side
