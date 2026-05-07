# FROM nginx:alpine

# RUN adduser -D -u 1001 appuser

# COPY . /usr/share/nginx/html

# RUN chown -R appuser:appuser /usr/share/nginx/html

# USER appuser

# EXPOSE 8080

# CMD ["nginx", "-g", "daemon off;"]
FROM nginx:alpine

# D01: Fixed UID/GID mapping
RUN addgroup -g 1001 -S appgroup && \
    adduser -u 1001 -S appuser -G appgroup

COPY . /usr/share/nginx/html
RUN chown -R appuser:appgroup /usr/share/nginx/html

# D01: Switch to non-root user
USER 1001:1001

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]