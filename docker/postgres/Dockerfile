FROM postgres:alpine3.17
ENV POSTGRES_USER docker
ENV POSTGRES_PASSWORD docker
ENV POSTGRES_DB docker
ENV PGDATA: /var/lib/postgresql/data/
COPY ./docker/postgres/HomeComando_create.sql /docker-entrypoint-initdb.d/