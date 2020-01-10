
## Reqs
1) Docker, Docker compose, Makefile, Git (for git clone)

## Installation
1) Clone/Download repo
2) run ``make build`` to build containers
2) run ``make setup`` to setup projects
3) run ``make test`` to test query
4) run ``make end `` to destroy task containers

## Notes
1) I did not try to guess column sizes and if field is required (only exception is canceled_at which looks like is optional)
2) It may sound strange but I not aware of "park" park context/meaning? I assumed that user can have may, thus group clause in query. 
3) Container services are marked as public which is bad practice, reason behind this is that service is not used and removed from container build time (https://symfony.com/blog/new-in-symfony-4-1-simpler-service-testing).
