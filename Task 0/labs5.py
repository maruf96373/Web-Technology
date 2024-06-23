def add_edge(graph, u, v, cost):
    if u not in graph:
        graph[u] = []
    graph[u].append((v, cost))

def find_all_paths(graph, start, goal):
    def dfs(current, goal, path):
        path.append(current)
        if current == goal:
            all_paths.append(list(path))
        else:
            for neighbor, _ in graph.get(current, []):
                if neighbor not in path:
                    dfs(neighbor, goal, path)
        path.pop()

    all_paths = []
    dfs(start, goal, [])
    return all_paths

def uniform_cost_search(graph, start, goal):
    from heapq import heappush, heappop
    priority_queue = [(0, start, [])]
    visited = set()

    while priority_queue:
        current_cost, current_node, current_path = heappop(priority_queue)

        if current_node in visited:
            continue
        visited.add(current_node)

        current_path = current_path + [current_node]

        if current_node == goal:
            return current_path, current_cost

        for neighbor, cost in graph.get(current_node, []):
            if neighbor not in visited:
                heappush(priority_queue, (current_cost + cost, neighbor, current_path))

    return None, None

graph = {}
add_edge(graph, '0', '1', 1)
add_edge(graph, '0', '4', 4)
add_edge(graph, '1', '3', 3)
add_edge(graph, '3', '2', 2)
add_edge(graph, '3', '4', 1)
add_edge(graph, '2', '4', 2)
add_edge(graph, '4', '2', 1)

start_node = '0'
goal_node = '4'

all_paths = find_all_paths(graph, start_node, goal_node)
print("All Paths:", all_paths)

optimal_path, optimal_cost = uniform_cost_search(graph, start_node, goal_node)
print("Optimal Path:", optimal_path)
print("Optimal Cost:", optimal_cost)
